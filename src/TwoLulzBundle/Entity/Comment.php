<?php

namespace TwoLulzBundle\Entity;

/**
 * Comment
 */
class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \TwoLulzBundle\Entity\Post
     */
    private $post;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \TwoLulzBundle\Entity\User
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set post
     *
     * @param \TwoLulzBundle\Entity\Post $post
     *
     * @return Comment
     */
    public function setPost($post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \TwoLulzBundle\Entity\Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set user
     *
     * @param \TwoLulzBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setUser($user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TwoLulzBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
