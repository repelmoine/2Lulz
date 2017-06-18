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


    public function postCommentAction(Request $request){

        $comment = new Comment();
        $form = $this->createForm(CommentType::class,$comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $comment = $form->getData();
            $em->persist($comment);
            $em->flush();
        }

        return $this->redirectToRoute('two_lulz_homepage');
    }
}