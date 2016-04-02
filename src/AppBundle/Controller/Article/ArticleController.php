<?php

namespace AppBundle\Controller\Article;

use AppBundle\Entity\Article\Article;
use AppBundle\Form\Article\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends Controller
{
    /**
     * @Route("/list", name="article_list")
     */
    public function listAction(Request $request)
    {
        //dump($request);die;
        $em = $this->getDoctrine()->getManager();
        $tag = $request->query->get('tag');
        //dump($tag);die;
        if ($tag != ''){
            $ArticleRepository = $em->getRepository('AppBundle:Article\Article');
            $articles  = $ArticleRepository->findBy([
                'tag' =>$tag,
            ]);
            return $this->render('AppBundle:Article:liste.html.twig',[
                'articles' => $articles,]);
        }elseif ($tag == '')
        {
            $ArticleRepository = $em->getRepository('AppBundle:Article\Article');
            $articles = $ArticleRepository->findAll();
            return $this->render('AppBundle:Home:index.html.twig',[
                'articles' => $articles,]);
        }

    }


    /**
     * @Route("/{id}", name="article_show", requirements={"id" = "\d+"})
     *
     * @param $id
     *
     * @return Response
     */
    public function showAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Id = $id;
        //dump($Id);
        $ArticleRepository = $em->getRepository('AppBundle:Article\Article');
        $articles  = $ArticleRepository->findBy([
            'id' =>$Id,
        ]);
        return $this->render('AppBundle:Article:show.html.twig',[
            'articles' => $articles,]);
        ;
        return new Response('Article avec l\'id '.$Id.' avec le tag '.$tag.'.');
    }

    /**
     * @Route("/new", name="article_new")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ArticleType::class);
        $form->handleRequest($request);

        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->redirect('../');
        }
        return $this->render('AppBundle:Article:new.html.twig',[
            'form' => $form->createView(),
        ]);


    }
}