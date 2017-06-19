<?php

namespace TwoLulzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TwoLulzBundle\Entity\Comment;
use \TwoLulzBundle\Entity\Post;
use TwoLulzBundle\Form\CommentType;
use \TwoLulzBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use TwoLulzBundle\Service\ImageUploader;

class PostController extends Controller{

    public function indexAction()
    {
        $post = new Post();
        $form = $this->createForm(PostType::class,$post);
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('TwoLulzBundle:Post');
        $allPosts = $repository->findAll();

        $comment = new Comment();
        $form2 = $this->createForm(CommentType::class,$comment);
        $repository2 = $em->getRepository('TwoLulzBundle:Comment');
        $allComments = $repository2->findAll();
        return $this->render('TwoLulzBundle:Default:index.html.twig', ['form' => $form->createView(),'form2' => $form2->createView(), 'posts' => $allPosts, 'comments' => $allComments]);
    }
    
    public function postPostsAction(Request $request)
    {

        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $imageUploader =  $this->get('imageUploader');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $post->getImage();
            $fileName = $imageUploader->upload($file);
            $post->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $post = $form->getData();
            $post->setScore(0);
            $em->persist($post);
            $em->flush();

        }else{
            print_r($this->get('validator')->validate($post));
            die;
        }

        return $this->redirectToRoute('two_lulz_homepage');
    }
}
