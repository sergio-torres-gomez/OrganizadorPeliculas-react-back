<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
	private $passwordHasher;

	public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("sergioparaclase@gmail.com");
        $user->setPassword($this->passwordHasher->hashPassword(
	        $user,
	        '1234'
	    ));
	    $user->setRoles([User::ROLE_USER]);

	    $manager->persist($user);
	    
	    $user = new User();
        $user->setEmail("admin");
        $user->setPassword($this->passwordHasher->hashPassword(
	        $user,
	        'admin'
	    ));
	    $user->setRoles([User::ROLE_USER, User::ROLE_ADMIN]);

        $manager->persist($user);

        $manager->flush();
    }
}
