<?php

namespace AppBundle\Controller\Article;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        return new Response('List of articles.');
    }

    /**
     * @Route("/{id}", requirements={"id" = "\d+"})
     *
     * @param $id
     *
     * @return Response
     */
    public function showAction($id, Request $request)
    {
        $tag = $request->query->get('tag');

        return new Response('Article avec l\'id '.$id.' avec le tag '.$tag.'.');
    }
}