<?php

namespace TwoLulzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller{
    public function indexAction()
    {
        return $this->render('TwoLulzBundle:Default:index.html.twig');
    }
}
