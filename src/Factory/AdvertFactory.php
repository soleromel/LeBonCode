<?php

namespace App\Factory;

use App\Entity\Advert;
use App\Repository\AdvertRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Advert>
 *
 * @method        Advert|Proxy                     create(array|callable $attributes = [])
 * @method static Advert|Proxy                     createOne(array $attributes = [])
 * @method static Advert|Proxy                     find(object|array|mixed $criteria)
 * @method static Advert|Proxy                     findOrCreate(array $attributes)
 * @method static Advert|Proxy                     first(string $sortedField = 'id')
 * @method static Advert|Proxy                     last(string $sortedField = 'id')
 * @method static Advert|Proxy                     random(array $attributes = [])
 * @method static Advert|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AdvertRepository|RepositoryProxy repository()
 * @method static Advert[]|Proxy[]                 all()
 * @method static Advert[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Advert[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Advert[]|Proxy[]                 findBy(array $attributes)
 * @method static Advert[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Advert[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<Advert> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<Advert> createOne(array $attributes = [])
 * @phpstan-method static Proxy<Advert> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<Advert> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<Advert> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<Advert> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<Advert> random(array $attributes = [])
 * @phpstan-method static Proxy<Advert> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<Advert> repository()
 * @phpstan-method static list<Proxy<Advert>> all()
 * @phpstan-method static list<Proxy<Advert>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<Advert>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<Advert>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<Advert>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<Advert>> randomSet(int $number, array $attributes = [])
 */
final class AdvertFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'city' => self::faker()->text(255),
            'postalCode' => self::faker()->randomNumber(),
            'price' => self::faker()->randomFloat(),
            'title' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Advert $advert): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Advert::class;
    }
}
