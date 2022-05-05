<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EntreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {  $faker=Factory::create('fr_FR');
        for($i=0;$i<50;$i++)
    {$entreprise=new Entreprise();
        $entreprise->setDesignation($faker->company);
        $manager->persist($entreprise);}
        for($i=0;$i<200;$i++)
        {
            $pfe=new PFE();
            $pfe->setTitle($faker->jobtitle);
            $pfe->setStudentFullName($faker->name);
            $pfe->getEntreprise(rand(1,49));
            $manager->persist($pfe);
        }
        $manager->flush();
    }
}
