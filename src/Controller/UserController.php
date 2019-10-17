<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/newUser", name="new_user")
     */
    public function newUserAction(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $newUser = new User();
        $newUser->setName("John Doe");
        $newUser->setAge(24);
        $newUser->setJob("Web Developer");

        $entityManager->persist($newUser);

        $entityManager->flush();

        $errors = $validator->validate($newUser);
        if(count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        return new Response('Saved a new user to the database!');
    }

    /**
     * @Route("/users", name="all_users")
     */
    public function UsersAction(): Response
    {
        //Fetch all the users from database
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();

        return $this->render('users.html.twig', ['users' => $users]);
    }
}
