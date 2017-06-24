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


class PostController extends Controller implements ClassResourceInterface
{


    public function cgetAction(){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('TwoLulzBundle:Post');
        $allPosts = $repository->findAll();



        $repository2 = $em->getRepository('TwoLulzBundle:Comment');
        $allComments = $repository2->findAll();

        json_encode($allComments,0);
        json_encode($allPosts,0);

        return array('posts' => $allPosts,'comments' => $allComments);
    }

    public function getAction($id){
        $em = $this->getDoctrine()->getManager();
        $repoUser = $em->getRepository('TwoLulzBundle:Post');
        $post = $repoUser->findOneBy(["id" => $id]);
        json_encode($post,0);

        return array('post' => $post);
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