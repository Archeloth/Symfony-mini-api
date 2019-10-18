<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Form\NewUserType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @Route("/users/new", name="new_user")
     */
    public function newUserAction(ValidatorInterface $validator, Request $request): Response
    {
        $form = $this->createForm(NewUserType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();

            $newUser = new User();
            $newUser->setName($form->get('name')->getData());
            $newUser->setAge($form->get('age')->getData());
            $newUser->setJob($form->get('job')->getData());

            $entityManager->persist($newUser);

            $entityManager->flush();

            $errors = $validator->validate($newUser);
            if (count($errors) > 0) {
                $this->addFlash('error', 'Error while handling data');
            }
            else
            {
                $this->addFlash('success', 'New user added');
            }
        }

        return $this->render('new_user.html.twig', ['form' => $form->createView()]);
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

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function DeleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);

        $user = $repository->find($id);

        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirect('/users');
    }

    /**
     * @Route("/modify/{id}", name="modify")
     */
    public function ModifyAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);

        $user = $repository->find($id);
/*
        $entityManager->remove($user);
        $entityManager->flush();
*/
//Problems here ->
        return $this->redirectToRoute('new_user');
    }
}
