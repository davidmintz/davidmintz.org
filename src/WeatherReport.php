<?php /** src/WeatherReport.php */
declare(strict_types=1);

namespace DMz;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;
use GuzzleHttp\Client;
use stdClass;

/** Simple weather reporting service. */
class WeatherReport 
{

    /**
     * cache directory
     *
     * @var string
     */
    private $cache_dir;

    /**
     * weather api key.
     * 
     * @var string
     */
     private $api_key;

    /**
     * Constructor.
     *
     * @param Array $config
     */
    public function __construct(Array $config)
    {
        $this->cache_dir = $config['cache_dir'];
        $this->api_key = $config['api_key'];
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
     * @param stdClass $data
     * @return String
     */
    public function composeReport(stdClass $data) :?  String
    {
       
        $celsius = round(($data->main->temp - 32) / 1.8);  
        $farenheit = round($data->main->temp);    
        $wind_direction = $this->degreesToWindDirection($data->wind->deg);
        $wind_speed = $data->wind->speed . ' mph';
        $when =  date('d-M-Y \a\t g:i a EST',$data->dt);
        $report = "As of $when, the local temperature was about $farenheit&deg;F/"
            . "$celsius&deg;C with {$data->main->humidity}% humidity and "
            . "{$data->weather[0]->description} with winds $wind_direction "
            . "at $wind_speed.";

        return $report;
    }

    /**
     * Gets weather report.
     *
     * @return String
     */
    public function getReport() : String
    {
        
            $cache = new FilesystemAdapter('', 600, $this->cache_dir);
            $report = $cache->get('weather_data',
                function(ItemInterface $i) {
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
/** returned data looks like this:
 
 stdClass Object
(
    [coord] => stdClass Object
        (
            [lon] => -70.562
            [lat] => 41.4543
        )

    [weather] => Array
        (
            [0] => stdClass Object
                (
                    [id] => 800
                    [main] => Clear
                    [description] => clear sky
                    [icon] => 01n
                )

        )

    [base] => stations
    [main] => stdClass Object
        (
            [temp] => 19.17
            [feels_like] => 9.66
            [temp_min] => 12.2
            [temp_max] => 27
            [pressure] => 1031
            [humidity] => 92
        )

    [visibility] => 10000
    [wind] => stdClass Object
        (
            [speed] => 7.56
            [deg] => 315
        )

    [clouds] => stdClass Object
        (
            [all] => 1
        )

    [dt] => 1612845742
    [sys] => stdClass Object
        (
            [type] => 1
            [id] => 5009
            [country] => US
            [sunrise] => 1612784761
            [sunset] => 1612822018
        )

    [timezone] => -18000
    [id] => 4946056
    [name] => Oak Bluffs
    [cod] => 200
)

 */
