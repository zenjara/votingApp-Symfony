<?php

namespace AppBundle\Entity;

/**
 * PollItem
 */
class PollItem
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
     * @var int
     */
    private $noOfVotes=0;

    /**
     * @var Poll
     */
    private $poll;


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
     * @return PollItem
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
     * Set noOfVotes
     * @return PollItem
     * @internal param int $noOfVotes
     *
     */
    public function addVote()
    {
        $this->noOfVotes += 1;

        return $this;
    }

    /**
     * Set noOfVotes
     * @return PollItem
     * @internal param int $noOfVotes
     *
     */
    public function removeVote()
    {
        if($this->noOfVotes > 0){
            $this->noOfVotes -= 1;
        }

        return $this;
    }

    /**
     * Get noOfVotes
     *
     * @return int
     */
    public function getNoOfVotes()
    {
        return $this->noOfVotes;
    }

    /**
     * @return Poll
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * @param Poll $poll
     */
    public function setPoll($poll)
    {
        $this->poll = $poll;
    }


}

