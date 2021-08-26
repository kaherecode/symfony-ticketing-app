<?php
// src/Controller/CoreController.php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoreController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findBy(
            ['isPublished' => true],
            ['eventDate' => 'ASC'],
            12,
            0
        );

        return $this->render('core/index.html.twig', ['events' => $events]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return new Response("<h1>About Symfony Ticketing App</h1>");
    }
}
