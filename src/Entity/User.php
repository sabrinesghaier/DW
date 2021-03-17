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
    private $name;

    /**
    * @ORM\Column(type="integer")
    */
    private $phone;

      /**
    * @ORM\Column(type="string")
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
     * Il y a plusieurs user possible pour plusieurs relations
     * @ORM\ManyToMany(targetEntity="App\Entity\Relation", mappedBy="user")
     * @ORM\JoinTable(name="user_relation")
     */
    private $relation; 
    

  
    

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Get il y a plusieurs user possible pour plusieurs relations
     */ 
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set il y a plusieurs user possible pour plusieurs relations
     *
     * @return  self
     */ 
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }
}

