<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager )
    {

		$password='$argon2id$v=19$m=65536,t=4,p=1$SwYJFa8Ok8xEdPbitccIEQ$+LbDvLDTH/ak9izzrx3YqStc2QgrO1wEO4FOsL8rhrg';
	    $recipe1 = new User();
	    $recipe1->setPassword($password);
	    $recipe1->setRoles(array('ROLE_ADMIN'));
	    $recipe1->setEmail('admin@example.com');
	    $manager->persist($recipe1);

        $manager->flush();
    }
}
