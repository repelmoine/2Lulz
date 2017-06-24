<?php
/**
 * Created by PhpStorm.
 * User: Rémi
 * Date: 24/06/2017
 * Time: 17:41
 */

namespace TwoLulzBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Response;



class CommentController extends Controller implements ClassResourceInterface
{

    public function cgetAction(){

        $allComments = $this->get('apiUtils')->getCommentManager()->findAll();

        $serializer = $this->get('jms_serializer');
        $json = $serializer->serialize($allComments, 'json');

        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function getAction($postId){
        $em = $this->getDoctrine()->getManager();
        $repository2 = $em->getRepository('TwoLulzBundle:Comment');
        $allComments = $repository2->findAll();

        $serializer = $this->get('jms_serializer');
        $json = $serializer->serialize($allComments, 'json');

        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function postAction($id){

    }

    public function putAction($id){

    }

    public function newAction(){

    }

    public function deleteAction($id){

    }



}