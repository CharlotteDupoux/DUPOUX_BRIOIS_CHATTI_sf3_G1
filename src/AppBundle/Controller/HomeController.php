<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article\Article;
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
        /* $antispam = $this->get('antispam');

        dump($antispam->isSpam('hhefzbshbcdshudbqsdhdsbdhsbqdwjbdqsdjhbsdcwdsx'));die; */

        /* $name = 'Symfony 3';

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
        ]); */

        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository('AppBundle:Article\Article');

        /* $article = new Article();
        $article
            ->setTitle('Osef du titre')
            ->setContent('blablacar')
            ->setTag('Arnaudlecassoc')
            ->setCreatedAt(new \DateTime())
        ;

        $em->persist($article);
        $em->flush(); */

        $articles = $articleRepository->findAll();

        return $this->render('AppBundle:Home:index.html.twig', [
           'articles' => $articles,
        ]);
    }
}
