<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $webTag = new Tag();
        $webTag->setLabel('web');

        $codeTag = new Tag();
        $codeTag->setLabel('code');

        $apiTag = new Tag();
        $apiTag->setLabel('api');

        $designTag = new Tag();
        $designTag->setLabel('api');

        $event1 = new Event();
        $event1->setPicture('https://images.pexels.com/photos/251225/pexels-photo-251225.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        $event1->setTitle('À la découverte du développement web');
        $event1->setAddress('Sacré Coeur 3 VDN, Dakar');
        $event1->setDescription('Lorem ipsum dolor sit amet consectetur
            adipisicing, elit. Libero tenetur beatae repellendus possimus magni
            quae! Impedit soluta sit iusto amet unde repudiandae fugit
            perspiciatis, deleniti quod placeat.');
        // la date de l'événement c'est dans 14 jours à 10h30
        $event1->setEventDate((new \DateTime('+14 days'))->setTime(10, 30));
        $event1->setIsPublished(true);
        $event1->setPublishedAt(new \DateTimeImmutable());
        $event1->addTag($webTag);
        $event1->addTag($codeTag);
        $manager->persist($event1);

        $event2 = new Event();
        $event2->setTitle('API REST - Best Practices');
        $event2->setPicture('https://images.pexels.com/photos/3861943/pexels-photo-3861943.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        $event2->setAddress('Impact Hub Dakar');
        $event2->setDescription('Lorem ipsum dolor sit amet consectetur
            adipisicing, elit. Libero tenetur beatae repellendus possimus magni
            quae! Impedit soluta sit iusto amet unde repudiandae fugit
            perspiciatis, deleniti quod placeat.');
        // la date de l'événement c'est dans 10 jours à 10h00
        $event2->setEventDate((new \DateTime('+10 days'))->setTime(10, 0));
        $event2->setIsPublished(true);
        $event2->setPublishedAt(new \DateTimeImmutable());
        $event2->addTag($webTag);
        $event2->addTag($codeTag);
        $event2->addTag($apiTag);
        $manager->persist($event2);

        $event3 = new Event();
        $event3->setTitle('Introduction au UX/UI Design');
        $event3->setPicture('https://images.pexels.com/photos/196644/pexels-photo-196644.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        $event3->setAddress('Toogueda - Lambanyi, Conakry');
        $event3->setDescription('Lorem ipsum dolor sit amet consectetur
            adipisicing, elit. Libero tenetur beatae repellendus possimus magni
            quae! Impedit soluta sit iusto amet unde repudiandae fugit
            perspiciatis, deleniti quod placeat.');
        // la date de l'événement c'est dans 14 jours à 16h00
        $event3->setEventDate((new \DateTime('+14 days'))->setTime(16, 0));
        $event3->setIsPublished(true);
        $event3->setPublishedAt(new \DateTimeImmutable());
        $event3->addTag($designTag);
        $manager->persist($event3);

        $event4 = new Event();
        $event4->setTitle('Symfony + API Platform pour vos API REST');
        $event4->setPicture('https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        $event4->setAddress('Jokkolabs Dakar');
        $event4->setDescription('Lorem ipsum dolor sit amet consectetur
            adipisicing, elit. Libero tenetur beatae repellendus possimus magni
            quae! Impedit soluta sit iusto amet unde repudiandae fugit
            perspiciatis, deleniti quod placeat.');
        // la date de l'événement c'est dans 5 jours à 10h00
        $event4->setEventDate((new \DateTime('+5 days'))->setTime(10, 0));
        $event4->setIsPublished(true);
        $event4->setPublishedAt(new \DateTimeImmutable());
        $event4->addTag($apiTag);
        $event4->addTag($webTag);
        $manager->persist($event4);

        $event5 = new Event();
        $event5->setTitle('Événement à venir, pas encore publique');
        $manager->persist($event5);

        $manager->flush();
    }
}
