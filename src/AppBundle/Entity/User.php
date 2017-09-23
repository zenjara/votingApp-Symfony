<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;


class User extends BaseUser
{

    protected $id;

    /**
     * @var ArrayCollection
     */
    private $polls;

    public function __construct()
    {
        parent::__construct();
        $this->polls = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getPolls()
    {
        return $this->polls;
    }

    /**
     * @param ArrayCollection $poll
     */
    public function addPoll($poll)
    {
        $this->polls = $poll;
    }

    /**
     * @param $poll
     */
    public function removePoll($poll)
    {
        $this->polls->removeElement($poll);
    }


}