<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
                            $user->setNom("Ratieuville");
                            $user->setPrenom("Antoine");
                            $user->setMail("antoine.ratieuville76@gmail.com");
                            $user->setPassword("azerty");
                            $user->setBirthdate(new \DateTime('2000-08-17'));
                            $user->setTaille(175);
                            $user->setPoids(70);
                            $user->setCigarette(true);
                            $user->setAlcool(true);
                            $user->setAdmin(true);
                            $manager->persist($user);

        for ($i = 1; $i < 40; $i++) {
                    $user = new User();
                    $user->setNom("Nom".$i);
                    $user->setPrenom("Prenom".$i);
                    $user->setMail("nom.prenom".$i."@gmail.com");
                    $user->setPassword("passwordsécurisédeouf".$i);
                    $user->setBirthdate(new \DateTime('2000-05-12'));
                    $user->setTaille(rand(150, 230));
                    $user->setPoids(rand(45,150));
                    $user->setCigarette(true);
                    $user->setAlcool(true);
                    $user->setAdmin(false);
                    $manager->persist($user);
                }

        $manager->flush();
    }
}
