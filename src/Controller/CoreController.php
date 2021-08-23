<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoreController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(): Response
    {
        return $this->render('core/index.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return new Response("<h1>About Symfony Ticketing App</h1>");
    }
}
