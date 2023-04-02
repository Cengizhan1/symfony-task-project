<?php

namespace App\DataFixtures;

use App\Entity\Developer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $array = [1,2,3,4,5];
        foreach ($array as  $item){
            $developer = new Developer();
            $developer->setName('Developer '.$item)->setLevel($item);
            $manager->persist($developer);
        }
        $manager->flush();
    }
}
