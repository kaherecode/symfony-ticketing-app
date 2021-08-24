<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Tag;
use DateInterval;
use DateTime;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/events/{id}", name="show_event", requirements={"id"="\d+"})
     */
    public function show($id): Response
    {
        return $this->render('event/show.html.twig', ['event_id' => $id]);
    }

    /**
     * @Route("/events/create", name="create_event")
     */
    public function createEvent(): Response
    {
        // on crée un événement, ces données pourraient venir d'un formulaire
        $event = new Event();
        $event->setPicture('https://images.pexels.com/photos/251225/pexels-photo-251225.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
        $event->setTitle('À la découverte du développement web');
        $event->setAddress('Sacré Coeur 3 VDN, Dakar');
        $event->setDescription('Lorem ipsum dolor sit amet consectetur
            adipisicing, elit. Libero tenetur beatae repellendus possimus magni
            quae! Impedit soluta sit iusto amet unde repudiandae fugit
            perspiciatis, deleniti quod placeat.');
        // la date de l'événement c'est dans 14 jours à 10h30
        $event->setEventDate((new DateTime('+14 days'))->setTime(10, 30));
        $event->setIsPublished(true); // on publie l'événement
        $event->setPublishedAt(new DateTimeImmutable());

        // on crée un deuxième événement qui ne sera pas publié pour l'instant
        $event2 = new Event();
        // on renseigne seulement le titre qui est obligatoire
        $event2->setTitle('Événement à venir, pas encore publique');

        // on ajoute quelques tags à l'événement
        $webTag = new Tag();
        $webTag->setLabel('web');
        $event->addTag($webTag);

        $codeTag = new Tag();
        $codeTag->setLabel('code');
        $event->addTag($codeTag);

        /* on récupère le gestionnaire d'entités qui va nous permettre
            d'enregistrer l'événement */
        $entityManager = $this->getDoctrine()->getManager();

        /* on confie l'objet $event au gestionnaire d'entités,
            l'objet n'est pas encore enregistrer en base de données */
        $entityManager->persist($event);

        // on confie aussi l'objet $event2 au gestionnaire d'entités
        $entityManager->persist($event2);

        /* on exécute maintenant les 2 requêtes qui vont ajouter
            les objets $event et $event2 en base de données */
        $entityManager->flush();

        return new Response(
            "Les événements {$event->getTitle()} et {$event2->getTitle()}
                ont bien été enregistrés."
        );
    }

    /**
     * @Route("/events/{category}", name="list_events")
     */
    public function list($category = null): Response
    {
        $htmlMessage = "<h1>Liste des événements";
        if ($category) {
            $htmlMessage .= " ave la catégorie: ${category}";
        }
        $htmlMessage .= "</h1>";

        return new Response($htmlMessage);
    }
}
