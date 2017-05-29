<?php

namespace TwoLulzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \TwoLulzBundle\Entity\Post;
use \TwoLulzBundle\Form\PostType;

class PostController extends Controller{
    public function indexAction()
    {
        $post = new Post();
        $form = $this->createForm(PostType::class,$post);
        return $this->render('TwoLulzBundle:Default:index.html.twig', ['form' => $form->createView(),]);
    }
}
