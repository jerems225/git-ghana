<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Useraccountactivity
 *
 * @ORM\Table(name="useraccountactivity")
 * @ORM\Entity(repositoryClass=UseraccountactivityRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups'=>'read:collection'],
    denormalizationContext:['groups'=>'write:UserActivity'],
    // paginationItemsPerPage: 10,
    // paginationMaximumItemsPerPage:10,
    // paginationClientEnabled:true,
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
            'normalization_context'=> ['groups'=> ['read:collection']],
          
                'openapi_context' => [
                    'security' => [['bearerAuth' => []]],
                ]
              ]
        ]
)]
class Useraccountactivity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:collection','write:UserActivity'])]
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="time", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','write:UserActivity'])]
    private $time;

    /**
     * @var string|null
     *
     * @ORM\Column(name="browser", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','write:UserActivity'])]
    private $browser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','write:UserActivity'])]
    private $ip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','write:UserActivity'])]
    private $location;

    /**
     * @var string|null
     *
     * @ORM\Column(name="action", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','write:UserActivity'])]
    private $action;

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
    #[Groups(['read:collection','write:UserActivity'])]
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

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(?string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getBrowser(): ?string
    {
        return $this->browser;
    }

    public function setBrowser(?string $browser): self
    {
        $this->browser = $browser;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;

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

