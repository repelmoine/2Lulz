<?php
/**
 * Created by PhpStorm.
 * User: Rémi
 * Date: 24/06/2017
 * Time: 17:03
 */

namespace TwoLulzBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Response;


class PostController extends Controller implements ClassResourceInterface
{


    public function cgetAction(){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('TwoLulzBundle:Post');
        $allPosts = $repository->findAll();



        return $response;
    }

    public function getAction($id){
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('TwoLulzBundle:Post');
        $post = $repoUser->findOneBy(["id" => $id]);

        $serializer = $this->get('jms_serializer');
        $json = $serializer->serialize($post, 'json');

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