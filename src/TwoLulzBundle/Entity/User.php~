<?php

namespace TwoLulzBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;


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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;


    /**
     * Add comment
     *
     * @param \TwoLulzBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\TwoLulzBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \TwoLulzBundle\Entity\Comment $comment
     */
    public function removeComment(\TwoLulzBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
