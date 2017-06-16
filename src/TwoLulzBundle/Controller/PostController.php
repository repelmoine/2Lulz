<?php

namespace TwoLulzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \TwoLulzBundle\Entity\Post;
use \TwoLulzBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller{
    public function indexAction()
    {
        $post = new Post();
        $form = $this->createForm(PostType::class,$post);
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('TwoLulzBundle:Post');
        $allPosts = $repository->findAll();
        
        $repository2 = $em->getRepository('TwoLulzBundle:Comment');
        $allComments = $repository2->findAll();
        return $this->render('TwoLulzBundle:Default:index.html.twig', ['form' => $form->createView(), 'posts' => $allPosts, 'comments' => $allComments]);
    }
    
    public function newAction()
    {

        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {

            /**$file = $post->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('images'),
                $fileName
            );
            $post->setImage($fileName);**/
            $title = $form->getData();
            //$file = $form["file"]->getData();
            $em = $this->getDoctrine()->getManager();
            $post->setTitle($title);
            $repository = $em->getRepository('TwoLulzBundle:User');
            $user = $repository->find(1);
            $post->setUser($user);
            //$post->setImage();

            $em->persist($post);

            // ... persist the $product variable or any other work

            return $this->forward('TwoLulzBundle:Post:index');
        //}
        //return $this->forward('TwoLulzBundle:Post:index');
    }
}
