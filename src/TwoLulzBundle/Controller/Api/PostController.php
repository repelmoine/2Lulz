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

        $apiService = $this->get('apiUtils');
        $allPosts = $apiService->getPostManager()->findAll();

        return  $apiService->serializeAndSetResponseJson($allPosts);
    }

    public function getAction($id){
        $apiService = $this->get('apiUtils');
        $post = $apiService->getPostManager()->findOneBy(["id" => $id]);

        return $apiService->serializeAndSetResponseJson($post);
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
        $post = $apiService->getPostManager()->findOneBy(["id" => $id]);

        $apiService->getEntityManager()->remove($post);
        $apiService->getEntityManager()->flush();

        $response = $apiService->serializeAndSetResponseJson("","204");

        return $response;
    }



}