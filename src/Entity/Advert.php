<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Controller\AdvertSearchAction;
use App\Repository\AdvertRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdvertRepository::class)]
#[ApiResource(
    description: 'A rare and valuable treasure.',
    operations: [
        new Get(),
        new GetCollection(),
        new GetCollection(
            name: 'search_advert',
            uriTemplate: '/search',
            controller: AdvertSearchAction::class,
            openapiContext: [
                'parameters' => [
                    [
                        'name' => 'title',
                        'in' => 'query',
                        'schema' => [
                            'type' => 'string',
                        ],
                    ],
                    [
                        'name' => 'minPrice',
                        'in' => 'query',
                        'schema' => [
                            'type' => 'integer',
                        ],
                    ],
                    [
                        'name' => 'maxPrice',
                        'in' => 'query',
                        'schema' => [
                            'type' => 'integer',
                        ],
                    ],
                ],
            ]
        ),
        new Post(),
        new Patch(),
        new Delete(),
    ]
)]
class Advert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $productDescription = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $postalCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    public function __construct(string $title)
    {
        $this->title = $title;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    public function setProductDescription(?string $productDescription): static
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }
}
