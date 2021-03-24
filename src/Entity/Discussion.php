<?php
// src/Entity/Discussion.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="discussion")
* */
class Discussion
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;

    /**
    * @ORM\Column(type="string")
    */
    private $titre;


    /**
     * Il y a une discussion pour plusieurs messages
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="discussion")
     */
    private $message; 

    /**
     * Il y a plusieurs user possible pour plusieurs relations
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="discussions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
     /**
     * Il y a plusieurs user possible pour plusieurs relations
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="discussions")
     */
    private $user2;

    public function __construct()

    {
        $this->message = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->user2 = new ArrayCollection();
        
    }
        
    
    

  
    

    


    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get il y a une discussion pour plusieurs messages
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set il y a une discussion pour plusieurs messages
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get il y a plusieurs user possible pour plusieurs relations
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set il y a plusieurs user possible pour plusieurs relations
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get il y a plusieurs user possible pour plusieurs relations
     */ 
    public function getUser2()
    {
        return $this->user2;
    }

    /**
     * Set il y a plusieurs user possible pour plusieurs relations
     *
     * @return  self
     */ 
    public function setUser2($user2)
    {
        $this->user2 = $user2;

        return $this;
    }
}