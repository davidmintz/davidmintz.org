<?php

namespace App\Controller;

use App\Service\Weather;
use DMz\Foo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Twig\Environment;

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

    #[Route('/food/{recipe}', name: 'food')]
    public function food(String $recipe = ''): Response
    {
        return $this->render('index/food/index.html.twig',['recipe'=>$recipe]);
    }

    #[Route('/music',name: 'music')]
    public function music(): Response
    {
        return $this->render('index/music/index.html.twig');
    }
    #[Route('/{template}', name: 'template')]
    public function template(Environment $twig, string $template) : Response
    {
        $loader = $twig->getLoader();
        if ($loader->exists("index/$template.html.twig")) {

            return $this->render("index/$template.html.twig",['template' => $template]);
        } else {
            /* yes we have to do better than this */
//            $error = "no such document '$template' exists";
//            return $this->render('index/index.html.twig',[
//                'template' => $template, 'answer' => $error
//            ]);
            return $this->redirectToRoute('index');
        }
    }

}
