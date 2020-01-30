<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserTypeAdmin;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        if(!in_array('ROLE_ADMIN', $this->getUser()->getRoles())){
            return $this->redirect($this->generateUrl('home'));
        }
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        if(!in_array('ROLE_ADMIN', $this->getUser()->getRoles())){
            return $this->redirect($this->generateUrl('home'));
        }
        $user = new User();
        $form = $this->createForm(UserTypeAdmin::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if(null !== $user->getIsAdmin()){
                $user->setIsAdmin(false);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        if($this->getUser() != $user){
            if(!in_array('ROLE_ADMIN', $this->getUser()->getRoles())){
                return $this->redirect($this->generateUrl('home'));
            }
        }

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        // if($this->getUser() != $user){
        //     if(!in_array('ROLE_ADMIN', $this->getUser()->getRoles())){
        //         return $this->redirect($this->generateUrl('home'));
        //     }
        // }

        //checa se o usuario é admin e carrega o form com ou sem a opção de tornar o outro usuario admin

        if(in_array('ROLE_ADMIN', $this->getUser()->getRoles())){
            $form = $this->createForm(UserTypeAdmin::class, $user);
        }else{
            $form = $this->createForm(UserType::class, $user);
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
