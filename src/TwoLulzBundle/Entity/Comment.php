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
     * @var string
     */
    private $text;


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
     * @var \TwoLulzBundle\Entity\Post
     */
    private $post;


    /**
     * Set post
     *
     * @param \TwoLulzBundle\Entity\Post $post
     *
     * @return Comment
     */
    public function setPost(\TwoLulzBundle\Entity\Post $post = null)
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
}
