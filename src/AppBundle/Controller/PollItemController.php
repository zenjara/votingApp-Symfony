<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PollItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PollItemController extends Controller
{
    public function increaseNoOfVotesAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $pollItem= $em->getRepository(PollItem::class)->findOneById($id);
        $pollItem->addVote();
        $em->persist($pollItem);
        $em->flush();

        return new JsonResponse(200);
    }

    public function decreaseNoOfVotesAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $pollItem= $em->getRepository(PollItem::class)->findOneById($id);
        $pollItem->removeVote();
        $em->persist($pollItem);
        $em->flush();

        return new JsonResponse(200);
    }
}