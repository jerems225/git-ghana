<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TimezoneRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Timezone
 *
 * @ORM\Table(name="timezone")
 ** @ORM\Entity(repositoryClass=TimezoneRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups'=>'read:collection'],
    denormalizationContext:['groups'=>'write:User','write:Timezone'],
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
class Timezone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:collection','read:UserTimeZone','write:TimeZone'])]
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    #[
        Groups(['read:collection','read:TimeZone','write:Timezone']),
        Length(min: 4)
    ]
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tvCategory", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','read:UserTimeZone','write:Timezone'])]
    private $tvcategory;

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

    public function getTvcategory(): ?string
    {
        return $this->tvcategory;
    }

    public function setTvcategory(?string $tvcategory): self
    {
        $this->tvcategory = $tvcategory;

        return $this;
    }


}
