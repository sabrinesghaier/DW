<?php
// src/Entity/Commentaire.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
* @ORM\Entity()
* @ORM\Table(name="commentaire")
* */
class Commentaire
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
    private $contenu;

    /**
     * Il y a plusieurs commentaires pour une publication
     * @ORM\ManyToOne(targetEntity="App\Entity\Publication", inversedBy="commentaires")
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     */
    private $publication;

    public function __construct()

    {
        $this->publication = new ArrayCollection();
        
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
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of publication
     */ 
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set the value of publication
     *
     * @return  self
     */ 
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }
}