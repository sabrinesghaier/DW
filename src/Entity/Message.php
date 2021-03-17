<?php
// src/Entity/Message.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity()
* @ORM\Table(name="message")
* */
class Message
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime
     */
    private $date;

    /**
    * @ORM\Column(type="string")
    */
    private $texte;

   /**
     * Il y a un seul user possible pour plusieurs discussions
     * @ORM\ManyToOne(targetEntity="App\Entity\Discussion", inversedBy="messages")
     */
    private $discussion;


   

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of texte
     */ 
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set the value of texte
     *
     * @return  self
     */ 
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get il y a un seul user possible pour plusieurs discussions
     */ 
    public function getDiscussion()
    {
        return $this->discussion;
    }

    /**
     * Set il y a un seul user possible pour plusieurs discussions
     *
     * @return  self
     */ 
    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;

        return $this;
    }
}

