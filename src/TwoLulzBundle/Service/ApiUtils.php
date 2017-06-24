<?php
/**
 * Created by PhpStorm.
 * User: RmX63
 * Date: 25/06/2017
 * Time: 00:34
 */

namespace TwoLulzBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class ApiUtils
{

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }



    public function getPostManager(){
        return $this->em->getRepository('TwoLulzBundle:Post');
    }

    public function setSerializeAndResponseJson($data){
        $serializer = $this->get('jms_serializer');
        $json = $serializer->serialize($data, 'json');

        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
    }
}