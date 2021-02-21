<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends AbstractController
{
//    public function __construct(GiftService $gifts)
//    {
//        $gifts->gifts =['a','b','c','d'];
//    }

    /**
     * @Route("/", name="default")
     */
    public function index(GiftService $gifts, Request $request,
                          SessionInterface $session)//autowire
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        //Session cookie---------------
//        exit($request->cookies->get('PHPSESSID')); //number of our session
        $session->set('name','session value');
        $session->remove('name');
        $session->clear();//clear the entire session data
        if ($session->has('name')){
            exit($session->get('name'));
        }
        //cookies------------------------------------
        //set
        /*
        $cookie= new Cookie(
            'my_cookie', // cookie name
            'cookie value', // cookie value
            time()+(2*365*24*60*60) //expires after 2 years
        );
        $res= new Response();
        $res->headers->setCookie($cookie); //attach cookie to the header sent to the browser
        $res->send();
        */
        //delete
        $res = new Response();
        $res->headers->clearCookie('my_cookie');
        $res->send();
        //cookies------------------------------------

        //splash----------------------------------
        /*
        $this->addFlash(
            'notice',
            'your changes are saved !'
        );

        $this->addFlash(
            'warning',
            'your changes are saved !'
        );
        */
        //end splash----------------------------------

        //render method
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift'=>$gifts->gifts,
        ]);
    }


    //advanced routes----------------------------------------------
    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    //? means optional parameters
    //in this exp requirements \d+ : means only numbers
    public function index2(){
        return new Response('optional parameters in url and requirements
        for parameters');
    }

    /**
     * @Route(
     *     "/article/{_local}/{year}/{slug}/{category}",
     *     defaults={"category":"computers"},
     *     requirements={
     *     "_locale":"en|fr",
     *     "category":"computer|rtv",
     *     "year": "\d+",
     *     }
     * )
     */
    public function index3(){
        return new Response('an advanced root example');
    }

    /**
     * @Route({
     *  "nl":"/over-ons",
     *     "en":"about-us",
     *     }, name="about_us")
     */
    public function index4(){
        return new Response("Translated routes");
    }
}
