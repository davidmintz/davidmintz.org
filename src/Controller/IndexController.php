<?php

namespace App\Controller;

use App\Service\Weather;
use DMz\Foo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CacheInterface $cache): Response
    {
        $key = $this->getParameter('app.weather_api_key');
        $weather = new Weather($cache, $key);
        return $this->render('index/index.html.twig', [
            'weather' => $weather->getReport(),
        ]);
    }

    #[Route('/weather', name: 'weather')]
    public function weather(CacheInterface $cache): Response
    {
        $weather = new Weather($cache,$this->getParameter('app.weather_api_key'));
        return new Response($weather->getReport());
    }

    #[Route('/privacy',name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('index/privacy.html.twig');
    }

    #[Route('/housesitting',name: 'housesitting')]
    public function housesitting(): Response
    {
        return $this->render('index/housesitting.html.twig');
    }

    #[Route('/letter-sdny',name:'letter-sdny')]
    public function letter_sdny(): Response
    {
        return $this->render('index/letter-sdny.html.twig');
    }


}
