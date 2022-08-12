<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Partner;
use App\Entity\Structure;
use Symfony\Bundle\MakerBundle\Str;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   

        //NEW USERS

        $orangeUser3 = new User();
        $orangeUser3
            ->setEmail('ruetartuffe@orangebleueparis.fr')
            ->setPassword('tartuffe')
            ->setName('Manager Roger Paris')
            ->setRoles(['ROLE_STRUCTURE'])
            ;

        // NEW PARTNER
        $orangePartner3 = new Partner();
        $orangePartner3
            ->setName('L\'orange Violette Paris')
            ->setUserId($orangeUser3)
            ->setPermissions([
                ['planning' => '0'],
                ['newsletter' => '0'],
                ['boissons' => '1'],
                ['sms' => '1'],
                ['concours' => '0'],
            ]);
        
        // NEW STRUCTURE
        $orangeStructure3 = new Structure();
        $orangeStructure3
            ->setPostalAdress('3 rue tartuffe, Paris')
            ->setUserId($orangeUser3)
            ->setPartnerId($orangePartner3)
            ;

        
        // COMMIT AND PUSH (Persist and Flush)
        
        $manager->persist($orangeUser3);
        $manager->persist($orangePartner3);
        $manager->persist($orangeStructure3);
        $manager->flush();
    }
}
