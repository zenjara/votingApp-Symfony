<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Poll;
use AppBundle\Form\PollType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PollController extends Controller
{

    public function homepageAction()
    {
        return $this->redirectToRoute("app.poll_index");
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $polls = $em->getRepository(Poll::class)->findAll();

        return $this->render(':default:index.html.twig', array(
            'polls' => $polls,
        ));
    }

    public function newAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $poll= new Poll();
        $form = $this->createForm(PollType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->get('security.token_storage')->getToken()->getUser();
            $poll= $form->getData();
            $poll->setUser($user);
            $em->persist($poll);
            $em->flush();

            return $this->redirectToRoute("app.poll_edit",["id"=>$poll->getId()]);
        }

        return $this->render('poll/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function showAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $poll= $em->getRepository(Poll::class)->findOneById($id);

        return $this->render('poll/show.html.twig', array(
            'poll' => $poll,
        ));
    }

    public function editAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $poll= $em->getRepository(Poll::class)->findOneById($id);

        $form = $this->createForm(PollType::class,$poll);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $poll= $form->getData();
            $em->persist($poll);
            $em->flush();
        }

        return $this->render('poll/edit.html.twig', array(
            'form' => $form->createView(),
        ));

    }

}