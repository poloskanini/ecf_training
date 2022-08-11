<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Partner;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   

        $orangeUser = new User();
        $orangeUser
            ->setEmail('orange@user.fr')
            ->setPassword('orangebleue')
            ->setName('Orange Bleue')
            ->setRoles(['ROLE_PARTNER'])
            ;

        $orangePartner = new Partner();
        $orangePartner
            ->setName('L\'orange bleue Dunkerque')
            ->setUserId($orangeUser)
            ->setPermissions([
                ['planning' => '1'],
                ['newsletter' => '1'],
                ['boissons' => '1'],
                ['sms' => '1'],
                ['concours' => '1'],
                ])
            ;

            $orangeUser2 = new User();
        $orangeUser2
            ->setEmail('orangejaune@user.fr')
            ->setPassword('orangejaune')
            ->setName('Orange Jaune')
            ->setRoles(['ROLE_USER'])
            ;

        $orangePartner2 = new Partner();
        $orangePartner2
            ->setName('L\'orange Jaune Lille')
            ->setUserId($orangeUser2)
            ->setPermissions([
                ['planning' => '0'],
                ['newsletter' => '0'],
                ['boissons' => '1'],
                ['sms' => '1'],
                ['concours' => '0'],
            ]);

        // $product = new Product();
        // $manager->persist($product);
        $manager->persist($orangeUser);
        $manager->persist($orangePartner);
        $manager->persist($orangeUser2);
        $manager->persist($orangePartner2);
        $manager->flush();
    }
}
