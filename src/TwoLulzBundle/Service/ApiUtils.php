<?php
/**
 * Created by PhpStorm.
 * User: RmX63
 * Date: 25/06/2017
 * Time: 00:34
 */

namespace TwoLulzBundle\Service;

use Doctrine\ORM\EntityManager;
use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;

class ApiUtils
{

    private $em;
    private $serializer;

    public function __construct(EntityManager $em, Serializer $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    public function getPostManager(){
        return $this->em->getRepository('TwoLulzBundle:Post');
    }

    public function getCommentManager(){
        return $this->em->getRepository('TwoLulzBundle:Comment');
    }

    public function serializeAndSetResponseJson($data,$codeStatus = "200"){

        if(!empty($data)){
            $json = $this->serializer->serialize($data, 'json');

            $response = new Response($json,$codeStatus);
            $response->headers->set('Content-Type', 'application/json');
        }else{
            $response = new Response("",$codeStatus);
        }


        return $response;
    }

    public function getEntityManager(){
        return $this->em;
    }
}