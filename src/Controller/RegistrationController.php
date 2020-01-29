<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function index(Request $req, UserPasswordEncoderInterface $userEncoder){
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


        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
