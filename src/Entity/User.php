<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\CreateUserController;
use App\Controller\MeController;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Email;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="user_email", columns={"email"})})
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */

 #[ApiResource(
            
              normalizationContext: ['groups'=>'read:collection'],
              denormalizationContext:['groups'=>['write:User','write:UserVerify']],
              collectionOperations:[
                  'get'=>[
                    'openapi_context' => [
                        'security' => [['bearerAuth' => []]],
                    ],
                    'security'=> 'is_granted("ROLE_USER")',
                  ],
                  'post'=>[
                    'openapi_context' => [
                        'security' => [['bearerAuth' => []]],
                    ],
                    'security'=> 'is_granted("ROLE_USER")',
                  ],
                //   'me'=> [
                //      'pagination_enable' => false,
                //      'path' => '/me',
                //      'method' => 'GET',
                //      'controller' => MeController::class,
                //      'read' => false,
                //      'security'=> 'is_granted("ROLE_USER")',
                //      'openapi_context' => [
                //          'security' => [['bearerAuth' => []]],
                //          'tags' => ['Authentification & Create User'],
                //      ]
                //   ],
                  'create_user'=> [
                    'pagination_enable' => false,
                    'path' => '/User/Create',
                    'method' => 'POST',
                    'controller' => CreateUserController::class,
                    'openapi_context' => [
                        'tags' => ['Authentification & Create User']
                    ],
                    'write'=> true
                  ]
                 ],
              itemOperations: [
                  'put'=>[
                    'openapi_context' => [
                        'security' => [['bearerAuth' => []]],
                    ]
                  ],
                  'delete'=>[
                    'openapi_context' => [
                        'security' => [['bearerAuth' => []]],
                    ]
                  ],
                  'get' => [
                      'normalization_context'=> ['groups'=> ['read:collection', 'read:item','read:Userprofile']],
                      'openapi_context' => [
                        'security' => [['bearerAuth' => []]],
                    ]
             
                  ],
                 ]
          )]
         
         //filter
         #[ApiFilter(SearchFilter::class,properties:['id'=>'exact', 'email'=>'partial'])]
         
         class User implements UserInterface
         {
             /**
              * @var int
              *
              * @ORM\Column(name="id", type="integer", nullable=false)
              * @ORM\Id
              * @ORM\GeneratedValue(strategy="IDENTITY")
              */
             #[Groups(['read:collection'])]
             private $id;
         
             /**
              * @var string|null
              *
              * @ORM\Column(name="email", type="string", length=255)
              */
             #[
                 Groups(['read:collection','write:User']),
                 Email(message: 'The email is not valid')
             ]
             private $email;
         
             /**
              * @var bool|null
              *
              * @ORM\Column(name="emailConfirmed", type="boolean", nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $emailconfirmed = '0';
         
             /**
              * @var string|null
              *
              * @ORM\Column(name="emailConfirmationToken", type="string", length=64, nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $emailconfirmationtoken;
         
             /**
              * @var string|null
              *
              * @ORM\Column(name="invitationRewardCount", type="decimal", precision=10, scale=0, nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $invitationrewardcount = '0';
         
             /**
              * @var string|null
              *
              * @ORM\Column(name="resetPasswordToken", type="string", length=64, nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $resetpasswordtoken;
         
             /**
              * @var \DateTime|null
              *
              * @ORM\Column(name="resetPasswordTokenCreatedAt", type="datetime", nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $resetpasswordtokencreatedat;
         
             /**
              * @var string The hashed password
              * @ORM\Column(name="password",type="string")
              */
             #[Groups(['read:collection','write:User'])]
             private $password; 
         
             /**
              * @ORM\Column(type="json")
              */
             #[Groups(['read:collection','write:User'])]
             private $roles = [];
         
             /**
              * @var string|null
              *
              * @ORM\Column(name="withdrawalLimit", type="decimal", precision=15, scale=6, nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $withdrawallimit;
         
             /**
              * @var string|null
              *
              * @ORM\Column(name="feeDiscountFactor", type="decimal", precision=15, scale=6, nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $feediscountfactor;
         
             /**
              * @var int|null
              *
              * @ORM\Column(name="referredBy", type="integer", nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $referredby;
         
             /**
              * @var bool|null
              *
              * @ORM\Column(name="isBot", type="boolean", nullable=true)
              */
             private $isbot = '0';
         
             /**
              * @var bool|null
              *
              * @ORM\Column(name="isExchange", type="boolean", nullable=true)
              */
             private $isexchange = '0';
         
             /**
              * @var bool|null
              *
              * @ORM\Column(name="isHolder", type="boolean", nullable=true)
              */
             #[Groups(['read:collection','write:User'])]
             private $isholder = '0';
         
             /**
              * @var \DateTime
              *
              * @ORM\Column(name="createdAt", type="datetime", nullable=false)
              */
             #[Groups(['read:collection'])]
             private $createdat;
         
             /**
              * @var \DateTime
              *
              * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
              */
             #[Groups(['read:collection'])]
             private $updatedat;
      
             /**
              * @ORM\OneToOne(targetEntity=Userprofile::class, cascade={"persist", "remove"})
              * @ORM\JoinColumn(nullable=false)
              */
            #[Groups(['read:collection','write:User'])]
             private $userprofile;
         
         
             public function __construct()
             {
                 $this->userprofiles = new ArrayCollection();
                 $this->createdat = new \DateTime();
                 $this->updatedat = new \DateTime();
                
             }
         
             public function getId(): ?int
             {
                 return $this->id;
             }
         
             public function getEmail(): ?string
             {
                 return $this->email;
             }
         
             public function setEmail(?string $email): self
             {
                 $this->email = $email;
         
                 return $this;
             }
         
             public function getEmailconfirmed(): ?bool
             {
                 return $this->emailconfirmed;
             }
         
             public function setEmailconfirmed(?bool $emailconfirmed): self
             {
                 $this->emailconfirmed = $emailconfirmed;
         
                 return $this;
             }
         
             public function getEmailconfirmationtoken(): ?string
             {
                 return $this->emailconfirmationtoken;
             }
         
             public function setEmailconfirmationtoken(?string $emailconfirmationtoken): self
             {
                 $this->emailconfirmationtoken = $emailconfirmationtoken;
         
                 return $this;
             }
         
             public function getInvitationrewardcount(): ?string
             {
                 return $this->invitationrewardcount;
             }
         
             public function setInvitationrewardcount(?string $invitationrewardcount): self
             {
                 $this->invitationrewardcount = $invitationrewardcount;
         
                 return $this;
             }
         
             public function getResetpasswordtoken(): ?string
             {
                 return $this->resetpasswordtoken;
             }
         
             public function setResetpasswordtoken(?string $resetpasswordtoken): self
             {
                 $this->resetpasswordtoken = $resetpasswordtoken;
         
                 return $this;
             }
         
             public function getResetpasswordtokencreatedat(): ?\DateTimeInterface
             {
                 return $this->resetpasswordtokencreatedat;
             }
         
             public function setResetpasswordtokencreatedat(?\DateTimeInterface $resetpasswordtokencreatedat): self
             {
                 $this->resetpasswordtokencreatedat = $resetpasswordtokencreatedat;
         
                 return $this;
             }
         
             /**
              * @see UserInterface
              */
             public function getPassword(): ?string
             {
                 return $this->password;
             }
         
             public function setPassword(?string $password): self
             {
                 $this->password = $password;
                 
         
                 return $this;
             }
         
             public function getWithdrawallimit(): ?string
             {
                 return $this->withdrawallimit;
             }
         
             public function setWithdrawallimit(?string $withdrawallimit): self
             {
                 $this->withdrawallimit = $withdrawallimit;
         
                 return $this;
             }
         
             public function getFeediscountfactor(): ?string
             {
                 return $this->feediscountfactor;
             }
         
             public function setFeediscountfactor(?string $feediscountfactor): self
             {
                 $this->feediscountfactor = $feediscountfactor;
         
                 return $this;
             }
         
             public function getReferredby(): ?int
             {
                 return $this->referredby;
             }
         
             public function setReferredby(?int $referredby): self
             {
                 $this->referredby = $referredby;
         
                 return $this;
             }
         
             public function getIsbot(): ?bool
             {
                 return $this->isbot;
             }
         
             public function setIsbot(?bool $isbot): self
             {
                 $this->isbot = $isbot;
         
                 return $this;
             }
         
             public function getIsexchange(): ?bool
             {
                 return $this->isexchange;
             }
         
             public function setIsexchange(?bool $isexchange): self
             {
                 $this->isexchange = $isexchange;
         
                 return $this;
             }
         
             public function getIsholder(): ?bool
             {
                 return $this->isholder;
             }
         
             public function setIsholder(?bool $isholder): self
             {
                 $this->isholder = $isholder;
         
                 return $this;
             }
         
             public function getCreatedat(): ?\DateTimeInterface
             {
                 return $this->createdat;
             }
         
             public function setCreatedat(\DateTimeInterface $createdat): self
             {
                 $this->createdat = $createdat;
         
                 return $this;
             }
         
             public function getUpdatedat(): ?\DateTimeInterface
             {
                 return $this->updatedat;
             }
         
             public function setUpdatedat(\DateTimeInterface $updatedat): self
             {
                 $this->updatedat = $updatedat;
         
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
   
             public function getUserprofile(): ?Userprofile
             {
                 return $this->userprofile;
             }

             public function setUserprofile(Userprofile $userprofile): self
             {
                 $this->userprofile = $userprofile;

                 return $this;
             }
         
         
         
             
         
         
         }

