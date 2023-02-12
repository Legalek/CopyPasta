<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\MicroPost;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $microPost1 = new MicroPost();
        $microPost1->setTitle('Siemano tutaj!');
        $microPost1->setText('Tutaj nic Ci nie grozi.');
        $microPost1->setCreated(new DateTime());
        $manager->persist($microPost1);
        // $manager->persist($product);

        $microPost2 = new MicroPost();
        $microPost2->setTitle('Siemano tam tez!');
        $microPost2->setText('Tutaj chyba nic :)');
        $microPost2->setCreated(new DateTime());
        $manager->persist($microPost2);

        $microPost3 = new MicroPost();
        $microPost3->setTitle('Siemano siema niemcy');
        $microPost3->setText('Tutaj chyba cos tam grozi :)');
        $microPost3->setCreated(new DateTime());
        $manager->persist($microPost3);

        $manager->flush();
    }
}
