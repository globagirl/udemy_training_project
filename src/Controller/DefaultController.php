<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
//        $users= ['tata','ran','kona'];
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $user = new User();
//        $user->setName('Adam');
//
//        $user2 = new User();
//        $user2->setName('Robert');
//
//        $user3 = new User();
//        $user3->setName('John');
//
//        $user4 = new User();
//        $user4->setName('Susan');
//
//        $entityManager->persist($user);
//        $entityManager->persist($user2);
//        $entityManager->persist($user3);
//        $entityManager->persist($user4);
//
//        $entityManager->flush();

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        //render method
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
        ]);
    }
}
