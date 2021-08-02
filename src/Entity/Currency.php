<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity(repositoryClass=CurrencyRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups'=>'read:collection'],
    denormalizationContext:['groups'=>'write:User','write:Currency'],
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
class Currency
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:collection','read:UserCurrency','write:Currency'])]
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    #[Groups(['read:collection','read:UserCurrency','write:Currency'])]
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=4, nullable=true)
     */
    #[
        Groups(['read:collection','read:UserCurrency','write:Currency']),
        Length(min: 2)
    ]
    private $abbreviation;

    /**
     * @var string
     *
     * @ORM\Column(name="usdRatio", type="decimal", precision=15, scale=6, nullable=false, options={"default"="1.000000"})
     */
    #[Groups(['read:collection','read:UserCurrency','write:Currency'])]
    private $usdratio = '1.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="symbol", type="string", length=5, nullable=true)
     */
    #[Groups(['read:collection','read:UserCurrency','write:Currency'])]
    private $symbol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="symbolNative", type="string", length=5, nullable=true)
     */
    #[Groups(['read:collection','read:UserCurrency','write:Currency'])]
    private $symbolnative;

    /**
     * @var int
     *
     * @ORM\Column(name="decimalPrecision", type="integer", nullable=false)
     */
    #[Groups(['read:collection','read:UserCurrency','write:Currency'])]
    private $decimalprecision;

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

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(?string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getUsdratio(): ?string
    {
        return $this->usdratio;
    }

    public function setUsdratio(string $usdratio): self
    {
        $this->usdratio = $usdratio;

        return $this;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(?string $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getSymbolnative(): ?string
    {
        return $this->symbolnative;
    }

    public function setSymbolnative(?string $symbolnative): self
    {
        $this->symbolnative = $symbolnative;

        return $this;
    }

    public function getDecimalprecision(): ?int
    {
        return $this->decimalprecision;
    }

    public function setDecimalprecision(int $decimalprecision): self
    {
        $this->decimalprecision = $decimalprecision;

        return $this;
    }


}





