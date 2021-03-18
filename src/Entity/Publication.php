<?php
// src/Entity/Publication.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
* @ORM\Entity()
* @ORM\Table(name="publication")
* */
class Publication
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
    private $type;


    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime
     */
    private $date; 

    /**
    * @ORM\Column(type="string")
    */
    private $description;

    

    /**
     * Il y a plusieurs publications possible pour un user
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="publications")
     */
    private $user;


     /**
     * Il y a une publication pour plusieurs commentaires
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="publication")
     *  @ORM\JoinColumn(name="commentaire_id", referencedColumnName="id")
     */
    private $commentaire;

    public function __construct()

    {
        $this->user = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        
    }
    

  
    

    


   

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

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
     * Get il y a plusieurs user possible pour plusieurs relations
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set il y a plusieurs user possible pour plusieurs relations
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get il y a plusieurs publications possible pour un user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set il y a plusieurs publications possible pour un user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of commentaire
     */ 
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}