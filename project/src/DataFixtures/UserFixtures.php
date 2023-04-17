<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setFirstname('Rick')
            ->setLastname('Joe')
            ->setEmail('admin@gmail.com')
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
            ->setPassword(
                $this->hasher->hashPassword($user, 'password')
            );
        
        $manager->persist($user);

        $user = new User();
        $user->setFirstname('Bob')
            ->setLastname('Dylan')
            ->setEmail('user@gmail.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword(
                $this->hasher->hashPassword($user, 'password')
            );

        $manager->persist($user);

        $manager->flush();
    }
}