<?php

namespace App\Controller;

use App\Entity\Place;
use App\Repository\ForecastRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// ==================================================

final class WeatherController extends AbstractController {
    #[Route('/weather/{name}', name: 'app_weather', requirements: [])]
    public function name(Place $place, ForecastRepository $repository): Response {
        $forecasts = $repository->findByPlace($place);
        return $this->render('weather/name.html.twig', [
            'place' => $place,
            'forecasts' => $forecasts,
        ]);
    }
}
