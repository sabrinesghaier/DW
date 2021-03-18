<?php
// src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="user")
* */
class User
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
    private $lastname;
       /**
    * @ORM\Column(type="string")
    */
    private $firstname;

    /**
    * @ORM\Column(type="integer")
    */
    private $phone;

      /**
    * @ORM\Column(type="string",unique=true)

    */
    private $mail;

     /**
    * @ORM\Column(type="string")
    */
    private $password;
    
    /**
     * Il y a un seul user possible pour plusieurs discussions
     * @ORM\OneToMany(targetEntity="App\Entity\Discussion", mappedBy="user")
     * @ORM\JoinColumn(name="discussion_id", referencedColumnName="id")
     */
    private $discussion;

    /**
     * Il y a un seul user possible pour plusieurs publications
     * @ORM\OneToMany(targetEntity="App\Entity\Publication", mappedBy="user")
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     */
    private $publication;

   /**
     * 
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * @ORM\JoinTable(name="relations")
     */
    private $relations;

  
    public function __construct()

    {
        $this->discussion = new ArrayCollection();
        $this->publication = new ArrayCollection();
        
    }

    

    /**
     * Get il y a un seul panier possible par client
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set il y a un seul panier possible par client
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get il y a un seul panier possible par client
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set il y a un seul panier possible par client
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get il y a un seul panier possible par client
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set il y a un seul panier possible par client
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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

    /**
     * Get il y a un seul user possible pour plusieurs publications
     */ 
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set il y a un seul user possible pour plusieurs publications
     *
     * @return  self
     */ 
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    

    /**
     * Get the value of relations
     */ 
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * Set the value of relations
     *
     * @return  self
     */ 
    public function setRelations($relations)
    {
        $this->relations = $relations;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
}

