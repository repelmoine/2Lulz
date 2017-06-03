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
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('TwoLulzBundle:Post');
        $allPosts = $repository->findAll();
        
        $repository2 = $em->getRepository('TwoLulzBundle:Comment');
        $allComments = $repository2->findAll();
        return $this->render('TwoLulzBundle:Default:index.html.twig', ['form' => $form->createView(), 'posts' => $allPosts, 'comments' => $allComments]);
    }
    
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $post->getImage();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $post->setImage($fileName);

            // ... persist the $product variable or any other work

            return $this->forward('TwoLulzBundle:Post:index');
        }
    }
}
