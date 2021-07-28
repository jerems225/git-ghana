<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CountryRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Country
 *
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
#[ApiResource(
    security:'is_granted("ROLE_ADMIN")',
    normalizationContext: ['groups'=>['read:collection']],
    denormalizationContext:['groups'=>['write:User','write:Country']],
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
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:collection','read:UserCountry','Write:User','write:Country'])]
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    #[
        Groups(['read:collection','read:UserCountry','Write:User','write:Country']),
        Length(min: 3)
    ]
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phoneCode", type="string", length=10, nullable=true)
     */
    #[Groups(['read:collection','read:UserCountry','Write:UserCountry','write:Country'])]
    private $phonecode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhonecode(): ?string
    {
        return $this->phonecode;
    }

    public function setPhonecode(?string $phonecode): self
    {
        $this->phonecode = $phonecode;

        return $this;
    }


}

