<?php

namespace App\Entity;

use App\Repository\UserauthstatusRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Userauthstatus
 *
 * @ORM\Table(name="userauthstatus")
 * @ORM\Entity(repositoryClass=UserauthstatusRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups'=>'read:collection'],
    denormalizationContext:['groups'=>'write:UserAuth'],
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
class Userauthstatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:collection','write:UserAuth'])]
    private $id;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="twoFactorAuthEnabled", type="boolean", nullable=true)
     */
    #[Groups(['read:collection','write:UserAuth'])]
    private $twofactorauthenabled = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="twoFactorAuthSecret", type="string", length=4000, nullable=true)
     */
    #[Groups(['read:collection','write:UserAuth'])]
    private $twofactorauthsecret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="smsVerificationToken", type="string", length=255, nullable=true)
     */
    #[Groups(['read:collection','write:UserAuth'])]
    private $smsverificationtoken;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="smsEnabled", type="boolean", nullable=true)
     */
    #[Groups(['read:collection','write:UserAuth'])]
    private $smsenabled = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="phoneNumber", type="string", length=50, nullable=true)
     */
    #[
        Groups(['read:collection','write:UserAuth']),
        Length(min: 8)
    ]
    private $phonenumber;

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
    #[Groups(['read:collection','write:UserAuth'])]
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

    public function getTwofactorauthenabled(): ?bool
    {
        return $this->twofactorauthenabled;
    }

    public function setTwofactorauthenabled(?bool $twofactorauthenabled): self
    {
        $this->twofactorauthenabled = $twofactorauthenabled;

        return $this;
    }

    public function getTwofactorauthsecret(): ?string
    {
        return $this->twofactorauthsecret;
    }

    public function setTwofactorauthsecret(?string $twofactorauthsecret): self
    {
        $this->twofactorauthsecret = $twofactorauthsecret;

        return $this;
    }

    public function getSmsverificationtoken(): ?string
    {
        return $this->smsverificationtoken;
    }

    public function setSmsverificationtoken(?string $smsverificationtoken): self
    {
        $this->smsverificationtoken = $smsverificationtoken;

        return $this;
    }

    public function getSmsenabled(): ?bool
    {
        return $this->smsenabled;
    }

    public function setSmsenabled(?bool $smsenabled): self
    {
        $this->smsenabled = $smsenabled;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

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
