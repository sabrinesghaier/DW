<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

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
     * @ORM\Column(type="string", unique=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * Il y a un seul user possible pour plusieurs discussions
     * @ORM\OneToMany(targetEntity="App\Entity\Discussion", mappedBy="user")
     */
    private $discussion;

    /**
     * Il y a un seul user possible pour plusieurs publications
     * @ORM\OneToMany(targetEntity="App\Entity\Publication", mappedBy="user")
     
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->mail;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

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
}
