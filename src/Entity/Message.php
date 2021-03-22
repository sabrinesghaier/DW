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
    private $nom;


    /**
    * @ORM\Column(type="string")
    */
    private $texte;
    /**
    * @ORM\Column(type="string")
    */
    private $objet;
    /**
    * @ORM\Column(type="string")
    */
    private $email;

   /**
     * Il y a un seul user possible pour plusieurs discussions
     * @ORM\ManyToOne(targetEntity="App\Entity\Discussion", inversedBy="messages")
     */
    private $discussion;


    public function __construct()

    {
        $this->discussion = new ArrayCollection();
        
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

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of objet
     */ 
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set the value of objet
     *
     * @return  self
     */ 
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }
}

