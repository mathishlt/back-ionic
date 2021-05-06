<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i < 40; $i++) {
            $user = new users();
            $user -> setNom("Nom" . $i);
            $user -> setPrenom("Prénom" . $i);
            $user -> setMail ("nom.prenom" . $i . "@gmail.com");
            $user -> setPassword ("azerty" . $i);
            $user -> setAge (rand(13, 70));
            $user -> setPoids (rand(40, 150));
            $user -> setTaille (rand(140, 250));
            $user -> setAdmin (0);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
