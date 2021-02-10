<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default/{name}", name="default")
     */
    public function index($name) // argument of the funct is $name
    {
        //render method
      /*
      return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);*/
        //or json response
      /*
      return $this->json([
            'username' => 'khawla.touati'
        ]);
      */

       // return new Response("hello $name !");

       // return $this->redirect('http://symfony.com');

        return $this->redirectToRoute('default2');
    }

    /**
     * @Route("/default2", name="default2")
     */
    public function index2()
    {
        return new Response("hello from default 2 route !");
    }
}
