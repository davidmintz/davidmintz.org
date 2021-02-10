<?php require '../vendor/autoload.php' ;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;
use GuzzleHttp\Client;

$cache_dir = __DIR__.'/../data/cache';
$cache = new FilesystemAdapter('', 600, __DIR__.'/../data/cache');

$weather = $cache->get('weather_data',function(ItemInterface $item) use ($cache_dir) {
    try {

        $config = (require(__DIR__.'/../config/config.local.php'))['weather'];    
        $client = new Client();    
        $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q=Oak+Bluffs,MA,US&units=imperial&appid={$config['api_key']}");
        $status = $response->getStatusCode();
        if (200 == $status) {
            return json_decode((string)$response->getBody());
        }
    } catch (\Exception $e) {

    }
});
// courtesy of a comment on https://gist.github.com/smallindine/d227743c28418f3426ed36b8969ded1a
function convertDegreesToWindDirection($degrees) {
    $directions = ['north', 'north/northeast', 'northeast', 'east/northeast', 'east', 
    'east/southeast', 'southeast', 'south/souteast', 'south', 'south/southwest', 'southwest', 'west/southwest', 'west',
     'west/northwest', 'northwest', 'north/northwest', 'north'];
	return $directions[round($degrees / 22.5)];
}

/**
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
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    
    <title>David Mintz, homo sapiens</title>
  </head>
  <body>
      <div class="container">
        <div id="banner" class="row rounded-3 mt-1 text-center d-flex">
            <div class="col align-self-center">
                <h1  class="mb-0">David Mintz</h1>
            <h3 class="mt-0"><em>homo sapiens</em></h3>
            </div>
        </div>
        <div class="row">

            <main class="col-md-6 offset-md-3 pt-3">
                
                 <p>If you're looking for the David Mintz who grew up in Silver Spring, Maryland; lived in Chile as a teenager; 
                     got degrees in classical guitar at the Hartt School of Music and at the University of Arizona; became a 
                    Spanish&lt;&gt;English interpreter for the US District Court in New York City; and retired from the 
                    federal judiciary in July 2020 &mdash; this is he.</p>
                    <p>
                    My wife Amy Hartford and I live in near-continuous bliss with our dog and three cats in a little house on a dirt road in 
                    Oak Bluffs, on Martha's Vineyard, an island south of Cape Cod, Massachussetts. We have four fascinating children: 
                    three from her previous marriage and one from mine.
                    </p>
                    <img class="img-fluid mb-2" src="images/with-lin-chi.jpg" alt="David is a handsome old guy with a gorgeous old cat">
                 

                        <?php if ($weather): 
                    $celsius = round(($weather->main->temp - 32) / 1.8);
                    $wind_direction = convertDegreesToWindDirection($weather->wind->deg);
                    $wind_speed = $weather->wind->speed . ' mph';
                    ?>
                <p>
                    As of <?php echo date('d-M-Y \a\t g:i a',$weather->dt) ?> the local temperature was 
                    about <?=round($weather->main->temp) ?>&deg;F/<?=$celsius?>&deg;C
                    with <?=$weather->main->humidity?>% humidity and <?=$weather->weather[0]->description?> with 
                    winds <?=$wind_direction?> at <?=$wind_speed?>. So much for the weather.
                </p>
                <h3>politics</h3>
                <p>Now let's talk about politics. I'm a socialist, a Marxist-Trotskyist, 
                    and I wholeheartedly support the <a href="https://socialequality.com">Socialist Equality Party</a>. There is a 
                    great deal more to say, but for now suffice it to say that I have lived in the world long enough to understand 
                    that capitalism is a system under which the social needs of the many are subordinated for the sake of the 
                    enrichment of a few at the top; inequality is an essential feature. The capitalist profit system is an utter disaster 
                    for the great majority of the world's population and the environment. The only rational, viable alternative is 
                    socialism. I recommend the World Socialist Web Site (<a href="https://wsws.org">wsws.org</a>) for further reading; 
                    it offers singularly honest and clear-minded reporting and commentary. </p>
                <?php endif;?>
                <h3>other stuff that interests me</h3>
                <p>I have had the good fortune to do a number of interesting things in the course of my life. I have performed as 
                    a classical guitarist; made over 1100 skydives; taken psychedelic drugs (LSD being my hands-down favorite); 
                    practiced Zen; run marathons and ultra-marathons; and probably some other cool shit that escapes me at the moment.
                </p>
            </main>

        </div>
      </div>
    

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- or: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
