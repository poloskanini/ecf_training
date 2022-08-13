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

        //NEW USER
        $orangeUser1 = new User();
        $orangeUser1
            ->setEmail('orangebleueparis@direction.fr')
            ->setPassword('paris')
            ->setName('Directeur Orange Bleue Paris')
            ->setRoles(['ROLE_PARTENAIRE'])
            ;

        // NEW PARTNER
        $orangePartner1 = new Partner();
        $orangePartner1
            ->setName('L\'orange Bleue Champs Elysées')
            ->setUserId($orangeUser1)
            ->setPermissions([
                ['planning' => '0'],
                ['newsletter' => '0'],
                ['boissons' => '1'],
                ['sms' => '1'],
                ['concours' => '0'],
            ]);
        
        // NEW STRUCTURE
        $orangeStructure1 = new Structure();
        $orangeStructure1
            ->setPostalAdress('3 rue tartuffe, Paris')
            ->setUserId($orangeUser1)
            ->setPartnerId($orangePartner1)
            ;
        
        // COMMIT AND PUSH (Persist and Flush)
        $manager->persist($orangeUser1);
        $manager->persist($orangePartner1);
        $manager->persist($orangeStructure1);
        $manager->flush();
    }
}
