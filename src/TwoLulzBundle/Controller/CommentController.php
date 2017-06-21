<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TwoLulzBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TwoLulzBundle\Entity\Comment;
use TwoLulzBundle\Entity\Post;
use TwoLulzBundle\Form\CommentType;

/**
 * Description of CommentController
 *
 * @author Utilisateur
 */
class CommentController extends Controller{


    public function addCommentAction(Request $request){

        $comment = new Comment();
        $form = $this->createForm(CommentType::class,$comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $repoPost = $em->getRepository('TwoLulzBundle:Post');
            $repoUser = $em->getRepository('TwoLulzBundle:User');

            $post = $repoPost->findOneBy(["id" => $comment->getPostId()]);
            $user = $repoUser->findOneBy(["id" => $comment->getUserId()]);

            $comment->setPost($post);
            $comment->setUser($user);
            $em->persist($comment);
            $em->flush();
        }

        return $this->redirectToRoute('two_lulz_homepage');
    }
}