<?php

namespace App\Entity;

use App\Repository\UserverificationstatusRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Userverificationstatus
 *
 * @ORM\Table(name="userverificationstatus")
 * @ORM\Entity(repositoryClass=UserverificationstatusRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups'=>'read:collection'],
    denormalizationContext:['groups'=>['write:User','write:UserVerify']],
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
class Userverificationstatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    #[Groups(['read:collection','read:UserVerify','write:UserVerify'])]
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    #[Groups(['read:collection','read:UserVerify'])]
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    #[Groups(['read:collection','read:UserVerify'])]
    private $updatedat;
    
    public function __construct()
    {
        $this->createdat = new \DateTime();
        $this->updatedat = new \DateTime();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    

}

