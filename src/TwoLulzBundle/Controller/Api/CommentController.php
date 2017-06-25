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

        $apiService = $this->get('apiUtils');
        $allComments = $apiService->getCommentManager()->findAll();

        return  $apiService->serializeAndSetResponseJson($allComments);

    }

    public function getAction($postId){

        $apiService = $this->get('apiUtils');
        $comment = $apiService->getCommentManager()->findOneBy(["post" => $postId]);

        return $apiService->serializeAndSetResponseJson($comment);
    }

    public function postAction($id){
        //TODO
    }

    public function putAction($id){
        //TODO
    }

    public function newAction(){
        //TODO
    }

    public function deleteAction($id){
        $apiService = $this->get('apiUtils');
        $comment = $apiService->getCommentManager()->findOneBy(["id" => $id]);

        $apiService->getEntityManager()->remove($comment);
        $apiService->getEntityManager()->flush();

        $response = $apiService->serializeAndSetResponseJson("","204");

        return $response;
    }



}