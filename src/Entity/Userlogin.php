<?php

namespace App\Entity;

use App\Repository\UserloginRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Userlogin
 *
 * @ORM\Table(name="userlogin")
 * @ORM\Entity(repositoryClass=UserloginRepository::class)
 */
#[ApiResource(
    security:'is_granted("ROLE_USER")',
    normalizationContext: ['groups'=>'read:collection','write:UserLogin'],
    collectionOperations:[
        'get'=>[
          'openapi_context' => [
              'security' => [['bearerAuth' => []]],
          ]
        ],
        'post'=>[
          'openapi_context' => [
              'security' => [['bearerAuth' => []]],
          ]
        ],
      
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
            'normalization_context'=> ['groups'=> ['read:collection']],
        
                'openapi_context' => [
                    'security' => [['bearerAuth' => []]],
                ]
        
           ]
        ]
)]
class Userlogin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:collection','write:UserLogin'])]
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="authToken", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','write:UserLogin'])]
    private $authtoken;

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
     * @ORM\ManyToOne(targetEntity=User::class)
     */   
    #[Groups(['read:collection'])]
    private $users;

    public function __construct()
    {
        $this->createdat = new \DateTime();
        $this->updatedat = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthtoken(): ?string
    {
        return $this->authtoken;
    }

    public function setAuthtoken(?string $authtoken): self
    {
        $this->authtoken = $authtoken;

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

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }



}

