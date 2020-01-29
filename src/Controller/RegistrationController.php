<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{

    private function alreadyRegistered(String $email, UserRepository $ur){
        if($ur->findBy(array('email' => $email))){
            return true;
        }   
        return false;
    }

    /**
     * @Route("/register", name="register")
     */
    public function index(Request $req, UserPasswordEncoderInterface $passwordEncoder, UserRepository $ur){
        //Cria o formulario de registro do novo usuario
        $form = $this->createFormBuilder()
            ->add('email')
            ->add('username')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label' => 'Senha'],
                'second_options' => ['label' => 'Confirmar senha']
            ])
            ->add('cpf')
            ->add('address')
            ->add('city')
            ->add('state')
            ->add('Registrar', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary float-right'
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($req);
        //Se o form ja tiver sido enviado, entra nesse bloco
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            
            //precisamos checar se o email ja nao está cadastrado
            if(!$this->alreadyRegistered($data['email'], $ur)){

                //Aqui se checa se a senha é igual a confirmação
                if(isset($data['password'])){
                    $user = new User();
                    $user->setEmail($data['email']);
                    $user->setUsername($data['username']);
                    $user->setPassword(
                        $passwordEncoder->encodePassword($user, $data['password'])
                    );
                    $user->setAddress($data['address']);
                    $user->setCity($data['city']);
                    $user->setState($data['state']);
                    $user->setCpf($data['cpf']);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();

                    return $this->redirect($this->generateUrl('app_login'));
                }
            }
        }


        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
