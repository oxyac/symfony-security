<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{

    private \App\Service\VendingService $vendingService;

    public function __construct(\App\Service\VendingService $vendingService)
    {
        $this->vendingService = $vendingService;
    }

    #[Route('/register_new', name: 'registration', methods: ['GET', 'POST'])]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher)
    {
        // ... e.g. get the user data from a registration form
        $user = new User();
        // creates a task object and initializes some data for this example
        $user->setUsername('VasyaPupkin');
        $user->setEmail('pupkin@hotmail.com');

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $user->getPassword()
            );
            $user->setPassword($hashedPassword);

            $this->vendingService->registerUser($user);
        }


        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);

        // hash the password (based on the security.yaml config for the $user class)


        // ...
    }
}