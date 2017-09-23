<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Poll
 */
class Poll
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var User
     */
    private $user;

    /**
     * @var PollItem
     */
    private $pollItems;

     public function __construct()
     {
         $this->pollItems = new ArrayCollection();
     }


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
     * Set name
     *
     * @param string $name
     *
     * @return Poll
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Poll
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return PollItem
     */
    public function getPollItems()
    {
        return $this->pollItems;
    }

    /**
     * @param PollItem $pollItem
     * @return $this
     */
    public function addPollItem($pollItem)
    {
        $this->pollItems = $pollItem;

        return $this;
    }


    /**
     * Remove users
     *
     * @param PollItem $pollItem
     */
    public function removePollItem($pollItem)
    {
        $this->pollItems->removeElement($pollItem);
    }

}
