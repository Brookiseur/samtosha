<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Cours;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cours = new Cours();
        $cours->setPresentation(true);
        $cours->setType('collectif');
        $cours->setDescription('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae reprehenderit, expedita repudiandae ducimus ut quisquam placeat. Sed, quam? Alias voluptatibus facilis cumque placeat velit reprehenderit qui eveniet sequi, illum debitis.');
        $cours->setTarif('16€');
        $manager->persist($cours);

        $cours = new Cours();
        $cours->setPresentation(true);
        $cours->setType('prive');
        $cours->setDescription('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae reprehenderit, expedita repudiandae ducimus ut quisquam placeat. Sed, quam? Alias voluptatibus facilis cumque placeat velit reprehenderit qui eveniet sequi, illum debitis.');
        $cours->setTarif('16€');
        $manager->persist($cours);

        $cours = new Cours();
        $cours->setPresentation(true);
        $cours->setType('en-ligne');
        $cours->setDescription('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae reprehenderit, expedita repudiandae ducimus ut quisquam placeat. Sed, quam? Alias voluptatibus facilis cumque placeat velit reprehenderit qui eveniet sequi, illum debitis.');
        $cours->setTarif('16€');
        $manager->persist($cours);

        $cours = new Cours();
        $cours->setPresentation(true);
        $cours->setType('atelier');
        $cours->setDescription('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae reprehenderit, expedita repudiandae ducimus ut quisquam placeat. Sed, quam? Alias voluptatibus facilis cumque placeat velit reprehenderit qui eveniet sequi, illum debitis.');
        $cours->setTarif('16€');
        $manager->persist($cours);

        $cours = new Cours();
        $cours->setPresentation(true);
        $cours->setType('retraite');
        $cours->setDescription('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae reprehenderit, expedita repudiandae ducimus ut quisquam placeat. Sed, quam? Alias voluptatibus facilis cumque placeat velit reprehenderit qui eveniet sequi, illum debitis.');
        $cours->setTarif('16€');
        $manager->persist($cours);
        
        $manager->flush();
    }
}
