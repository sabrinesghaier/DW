<?php
// src/Entity/Profil.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;




/**
* @ORM\Entity()
* @ORM\Table(name="profil")
* */
class Profil
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
}