<?php
// src/Entity/Relation.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="relation")
* */
class Relation
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;

     /**
     * Il y a plusieurs user possible pour plusieurs relations
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="relations")
     */
    private $user;

    public function __construct()

    {
        $this->user = new ArrayCollection();
        
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
}

