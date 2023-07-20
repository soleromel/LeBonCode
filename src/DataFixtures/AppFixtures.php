<?php

namespace App\DataFixtures;

use App\Factory\AdvertFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AdvertFactory::createMany(10);
        UserFactory::createMany(2);
        $manager->flush();
    }
}
