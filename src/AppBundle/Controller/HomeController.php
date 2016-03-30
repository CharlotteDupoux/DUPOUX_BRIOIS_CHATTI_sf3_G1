<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        //return $this->render('AppBundle:Default:index.html.twig');
        $name= 'Symfony 3';
        $tutorials = [
            [
                'id' => 1 ,
                'name' => 'Php POO'
            ],
            [
                'id' => 2 ,
                'name' => 'Laravel'
            ],
            [
                'id' => 3 ,
                'name' => 'Symfony 3'
            ],
        ];
        return $this->render('AppBundle:Home:index.html.twig', [
            'name'=> $name,
            'tutorials' => $tutorials,
        ]);
    }
}
