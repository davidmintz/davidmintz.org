<?php
declare(strict_types=1);
namespace App\Service;

use GuzzleHttp\Client;
use Psr\Cache\InvalidArgumentException;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class Weather
{
    public function __construct(private CacheInterface $cache, private string $api_key)
    {

    }


    /**
     * Converts degrees to cardinal direction.
     *
     * Courtesy of a comment on https://gist.github.com/smallindine/d227743c28418f3426ed36b8969ded1a
     *
     * @param Int $degrees
     * @return String
     */
    public function degreesToWindDirection(Int $degrees) : String
    {
        $directions = ['north', 'north/northeast', 'northeast', 'east/northeast', 'east',
            'east/southeast', 'southeast', 'south/southeast', 'south', 'south/southwest', 'southwest', 'west/southwest', 'west',
            'west/northwest', 'northwest', 'north/northwest', 'north'];

        return $directions[round($degrees / 22.5)];
    }

    /**
     * Composes a weather report.
     *
     * @param \stdClass $data
     * @return String
     */
    public function composeReport(\stdClass $data) :  String
    {

        $celsius = round(($data->main->temp - 32) / 1.8);
        $farenheit = round($data->main->temp);
        $wind_direction = $this->degreesToWindDirection($data->wind->deg);
        $wind_speed = $data->wind->speed . ' mph';
        $when =  date('d-M-Y \a\t g:i a',$data->dt);
        $report = "As of $when EST, the local temperature was about $farenheit&deg;F/"
            . "$celsius&deg;C with {$data->main->humidity}% humidity and "
            . "{$data->weather[0]->description} with winds $wind_direction "
            . "at $wind_speed.";

        return $report;
    }

    /**
     * Gets weather report.
     *
     * @return String
     * @throws InvalidArgumentException
     */
    public function getReport() : String
    {

//        $cache = new FilesystemAdapter('', 600, $this->cache_dir);
        $report = $this->cache->get('weather_data',
            function(ItemInterface $i) {
                $i->expiresAfter(300);
                $client = new Client();
                $url = "https://api.openweathermap.org/data/2.5/weather?q=Oak+Bluffs,MA,US&units=imperial&appid={$this->api_key}";
                try {
                    $response = $client->get($url);
                    $status = $response->getStatusCode();
                    if (200 == $status) {
                        $data = json_decode((string)$response->getBody());
                        return  $this->composeReport($data);
                    }
                } catch (\Exception $e) {
                    // to do: log it
                    return '';
                }
            }
        );

        return $report;
    }
}
