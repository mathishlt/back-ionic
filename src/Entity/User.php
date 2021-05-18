<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Controller\MeController;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */

 #[ApiResource(
                                                                   security: 'is_granted("ROLE_USER")',
                                                                   collectionOperations : [
                                                                       'me' => [
                                                                         'pagination_enabled' => false,
                                                                         'path' => '/me',
                                                                         'method' => 'get',
                                                                         'controller' => MeController::class,
                                                                         'read' => false
                                                                       ]
                                                                   ],
                                                                   itemOperations: [
                                                                       'get' => [
                                                                           'controller' => NotFoundAction::class,
                                                                           'openapi_context' => ['summary' => 'hidden'],
                                                                           'read' => false,
                                                                           'output' => false
                                                                        ]
                                                                   ],
                                                                   normalizationContext: ['groups' => ['read:User']]
                                                                )]
                                                               
                                                               class User implements UserInterface
                                                               {
                                                                   /**
                                                                    * @ORM\Id
                                                                    * @ORM\GeneratedValue
                                                                    * @ORM\Column(type="integer")
                                                                    */
                                                                   #[Groups(['read:User'])]
                                                                   private $id;
                                                               
                                                                   /**
                                                                    * @ORM\Column(type="string", length=180, unique=true)
                                                                    */
                                                                   #[Groups(['read:User'])]
                                                                   private $email;
                                                               
                                                                   /**
                                                                    * @ORM\Column(type="json")
                                                                    */
                                                                   #[Groups(['read:User'])]
                                                                   private $roles = [];
                                                               
                                                                   /**
                                                                    * @var string The hashed password
                                                                    * @ORM\Column(type="string")
                                                                    */
                                                                   private $password;
                                                            
                                                                   /**
                                                                    * @ORM\Column(type="string", length=255)
                                                                    */
																	#[Groups(['read:User'])]

                                                                   private $nom;
                                                   
                                                                   /**
                                                                    * @ORM\Column(type="string", length=255)
                                                                    */
																	#[Groups(['read:User'])]
                                                                   private $prenom;
                                          
                                                                   /**
                                                                    * @ORM\Column(type="date")
                                                                    */
																	#[Groups(['read:User'])]
                                                                   private $birthdate;
                                 
                                                                   /**
                                                                    * @ORM\Column(type="integer")
                                                                    */
																	#[Groups(['read:User'])]
                                                                   private $taille;
                        
                                                                   /**
                                                                    * @ORM\Column(type="float")
                                                                    */
																	#[Groups(['read:User'])]
                                                                   private $poids;
               
                                                                   /**
                                                                    * @ORM\Column(type="boolean")
                                                                    */
																	#[Groups(['read:User'])]
                                                                   private $cigarette;
      
                                                                   /**
                                                                    * @ORM\Column(type="boolean")
                                                                    */
																	#[Groups(['read:User'])]
                                                                   private $alcool;
                                                               
                                                                   public function getId(): ?int
                                                                   {
                                                                       return $this->id;
                                                                   }
                                                               
                                                                   public function getEmail(): ?string
                                                                   {
                                                                       return $this->email;
                                                                   }
                                                               
                                                                   public function setEmail(string $email): self
                                                                   {
                                                                       $this->email = $email;
                                                               
                                                                       return $this;
                                                                   }
                                                               
                                                                   /**
                                                                    * A visual identifier that represents this user.
                                                                    *
                                                                    * @see UserInterface
                                                                    */
                                                                   public function getUsername(): string
                                                                   {
                                                                       return (string) $this->email;
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
                                                                       return $this->password;
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
                                                         
                                                                   public function getNom(): ?string
                                                                   {
                                                                       return $this->nom;
                                                                   }
                                                      
                                                                   public function setNom(string $nom): self
                                                                   {
                                                                       $this->nom = $nom;
                                                      
                                                                       return $this;
                                                                   }
                                                
                                                                   public function getPrenom(): ?string
                                                                   {
                                                                       return $this->prenom;
                                                                   }
                                             
                                                                   public function setPrenom(string $prenom): self
                                                                   {
                                                                       $this->prenom = $prenom;
                                             
                                                                       return $this;
                                                                   }
                                       
                                                                   public function getBirthdate(): ?\DateTimeInterface
                                                                   {
                                                                       return $this->birthdate;
                                                                   }
                                    
                                                                   public function setBirthdate(\DateTimeInterface $birthdate): self
                                                                   {
                                                                       $this->birthdate = $birthdate;
                                    
                                                                       return $this;
                                                                   }
                              
                                                                   public function getTaille(): ?int
                                                                   {
                                                                       return $this->taille;
                                                                   }
                           
                                                                   public function setTaille(int $taille): self
                                                                   {
                                                                       $this->taille = $taille;
                           
                                                                       return $this;
                                                                   }
                     
                                                                   public function getPoids(): ?float
                                                                   {
                                                                       return $this->poids;
                                                                   }
                  
                                                                   public function setPoids(float $poids): self
                                                                   {
                                                                       $this->poids = $poids;
                  
                                                                       return $this;
                                                                   }
            
                                                                   public function getCigarette(): ?bool
                                                                   {
                                                                       return $this->cigarette;
                                                                   }
         
                                                                   public function setCigarette(bool $cigarette): self
                                                                   {
                                                                       $this->cigarette = $cigarette;
         
                                                                       return $this;
                                                                   }
   
                                                                   public function getAlcool(): ?bool
                                                                   {
                                                                       return $this->alcool;
                                                                   }

                                                                   public function setAlcool(bool $alcool): self
                                                                   {
                                                                       $this->alcool = $alcool;

                                                                       return $this;
                                                                   }
                                                               }
