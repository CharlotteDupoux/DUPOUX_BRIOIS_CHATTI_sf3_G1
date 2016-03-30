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
        $antispam = $this->get('antispam');

        dump($antispam->isSpam('hhefzbshbcdshudbqsdhdsbdhsbqdwjbdqsdjhbsdcwdsx'));die;

        $name = 'Symfony 3';

        $tutorials = [
            [
                'id' => 2,
                'name' => 'Symfony2'
            ],
            [
                'id' => 5,
                'name' => 'Wordpress'
            ],
            [
                'id' => 9,
                'name' => 'Laravel'
            ],
        ];

        return $this->render('AppBundle:Home:index.html.twig', [
            'name'      => $name,
            'tutorials' => $tutorials,
        ]);
    }
}
