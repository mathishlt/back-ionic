<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
  private $passwordEncoder;
  public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
    $this->passwordEncoder = $passwordEncoder;
  }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("antoine.ratieuville76@gmail.com");
        $user->setRoles([]);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'azerty'));
        $user->setNom("Ratieuville");
        $user->setPrenom("Antoine");
        $user->setBirthdate(new \DateTime('2000-08-17'));
        $user->setTaille(175);
        $user->setPoids(70);
        $user->setCigarette(true);
        $user->setAlcool(true);
        $manager->persist($user);

        for ($i = 1; $i < 40; $i++) {
            $user = new User();
            $user->setEmail("nom.prenom".$i."@gmail.com");
            $user->setRoles([]);
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'azerty'));
            $user->setNom("Nom".$i);
            $user->setPrenom("Prenom".$i);
            $annee = rand(1950, 2002);
            $mois = rand(01, 12);
            $jour = rand(01, 31);
            $user->setBirthdate(new \DateTime($annee.'-'.$mois .'-'.$jour));
            $user->setTaille(rand(150, 230));
            $user->setPoids(rand(45,150));
            $user->setCigarette(true);
            $user->setAlcool(true);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
