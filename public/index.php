<?php require '../vendor/autoload.php' ;
$config = (require(__DIR__.'/../config/config.local.php'))['weather']; 
try { $weather = new DMz\WeatherReport($config); } 
catch (\Exception $e) {  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta name="description" content="David E. Mintz is a human being residing on Martha's Vineyard, an island off the coast of Massachussetts, USA. 
    He is, among other things, a web developer, Marxist, meditator, father, stepfather, husband, former marathoner, and former Spanish-English interpreter for the 
    federal court in New York City.">
    <meta property="og:title" content="David Mintz, homo sapiens">
    <meta property="og:description" content="David E. Mintz is a human being residing in a state of near-continuous bliss on Martha's Vineyard, an island off the coast of Massachussetts, USA. ">
    <meta property="og:image" content="https://davidmintz.org/images/20201111_134532.jpg">
    <meta property="og:url" content="https://davidmntz.org/index.php">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
            <main class="col-md-7 offset-md-2 pt-3 pb-4 border-bottom mb-2">               
                 <p>If you're looking for the David Mintz who grew up in Silver Spring, Maryland; lived in Chile as a teenager; 
                     got degrees in classical guitar at the Hartt School of Music and at the University of Arizona; became a 
                    Spanish&lt;&gt;English interpreter for the US District Court in New York City; and retired from the 
                    federal judiciary in July 2020 &mdash; this is he.</p>
                    <p>
                    My wife Amy Hartford and I live in near-continuous bliss with our dog and three cats in a little house on a dirt road in 
                    Oak Bluffs, on Martha's Vineyard, an island south of Cape Cod, Massachussetts, USA. Before washing ashore here, 
                    I lived in New Jersey for 30 years, mostly in Jersey City followed by South Orange. Amy and I have four fascinating children: 
                    three from her previous marriage and one from mine.
                    </p>
                    <!-- <img class="img-fluid mb-2" src="images/with-lin-chi.jpg" alt="David is a handsome old guy with a gorgeous old cat"> -->
                    <div id="carousel-mv" class="carousel slide mb-3" data-bs-wrap="true" data-bs-ride="carousel">
                        <!-- <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="0" class="active" aria-current="true" aria-label="photo 1"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="1" aria-label="photo 2"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="2" aria-label="photo 3"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="3" aria-label="photo 4"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="4" aria-label="photo 5"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="5" aria-label="photo 6"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="6" aria-label="photo 7"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="7" aria-label="photo 8"></button>
                            <button type="button" data-bs-target="#carousel-mv" data-bs-slide-to="8" aria-label="photo 9"></button>
                        </div> -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">                            
                                <img src="images/20201111_134532.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20201106_102310.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20201110_092922.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20201120_122816.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20201205_224635.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20201209_133057.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20201212_092711.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20210101_132545.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20210207_160128.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">                            
                                <img src="images/20210211_105700.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>                                                                       
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-mv"  data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden sr-only">previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-mv"  data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden sr-only">next</span>
                        </button>
                    </div>
                    
            <?php if (!empty($weather)) : $report = $weather->getReport(); ?>
            <h3 id="weather">the weather</h3>
                <p><?=$report?></p>
            <?php endif;?>
            
                <h3>politics</h3>
                <p>Now let's talk about politics. I'm a socialist, a Marxist-Trotskyist, 
                    and I wholeheartedly support the <a href="https://socialequality.com">Socialist Equality Party</a>. There is a 
                    great deal more to say, but for now suffice it to say that I have lived in the world long enough to understand 
                    that capitalism is a system under which the social needs of the many are subordinated for the sake of the 
                    enrichment of a few at the top; inequality is an essential feature. The capitalist profit system is an utter disaster 
                    for the great majority of the world's population and the environment. The only rational, viable alternative is 
                    socialism. I recommend the World Socialist Web Site (<a href="https://wsws.org">wsws.org</a>) for further reading; 
                    it offers singularly honest, clear-minded reporting and commentary. </p>
                <h2>other stuff that interests me</h2>
                <p>I have had the good fortune to do a number of interesting things in the course of my life. I have performed as 
                    a classical guitarist; made over 1100 skydives; taken psychedelic drugs (LSD being my favorite); 
                    practiced Zen; run marathons and ultra-marathons; coded web applications that have made people's work 
                    less onerous; and probably some other cool shit that escapes me at the moment. It's a long, strange curriculum vitae.
                </p>
                <h4 id="web-development">web development</h4>
                <p>I became a full-stack web developer because when I started working as a staff Spanish interpreter for the federal court, 
                the manual, paper-based methods we were  using to run our busy office were becoming untenable.  But I was unable to find 
                any software that served our purposes. So I set about coding our own court interpreter management system. The resulting app 
                has been developed, revised, and battle-tested for over 20 years, and is freely available as an open-source project. 
                I call it <span class="font-monospace"><a target="_blank" href="https://interpretersoffice.org">InterpretersOffice</a></span>.
                The source code repository is <a a target="_blank" href="https://github.com/davidmintz/court-interpreters-office">on Github</a>.
                By all means check it out and feel free to contact david@interpretersoffice.org with any questions.</p>
                <h4 id="zen">zen</h4>
                <p>Once upon a time I was a student at a zendo in New York City, drawn to it because I was curious about 
                    practicing meditation. I participated in formal sittings and certain Zen Buddhist rituals -- chanting and bowing 
                    and so forth -- worked with a teacher, studied koans. After a couple years I moved on, but continued the 
                    habit of sitting every day. There's ample evidence that sitting still and breathing in and out is beneficial 
                    to psychological and physical health, but that isn't what motivates me. Nor do I care for what is commonly known 
                    as spirituality. After some 15 years I've been sitting long enough to do it for no reason or purpose, with no 
                    expectation of reward. It pleases me to report that I have accomplished nothing.
                </p>
                <h4 id="running">distance running</h4>
                <p>I didn't start running semi-seriously until I was in my 50s, and have since aged out of the game, 
                    though I'm still good for a few easy miles a couple times a week. But there were several years where 
                    I greatly enjoyed training and running races, with respectable age-relative results. Just a couple years before my 
                first marathon, the idea of running one was inconceivable. I must have mistakenly believed you had to be an extraordinary 
                athlete to be a marathoner at all. Of course it does require considerable effort and reasonably good general health to get fit enough 
                to get through it, but this is well within the reach of ordinary people. I was pleasantly astounded to discover how 
                hard it was <em>not</em> to run 50 kilometer trail races, as long as you pace yourself correctly. The risk of injury is 
                significant, true -- repetitive strain with road running, traumatic injuries from falling on the trails -- 
                but it's manageable. So if this is something you've thought about but have never tried, I'd encourage you to go for it.
                </p>
                <h4 id="music">music</h4>
                <p>To succeed as a professional musican you need talent, determination, resourcefulness, discipline, and luck. Perhaps 
                    I was lacking in one or more of these. I studied classical guitar, performed, taught, and quit at around the age 
                    of 30 after deciding it was time to find a better way to pay the bills. I have nothing to regret; the way my life has turned 
                    out has been more than satisfactory. And it gives me immense satisfaction to see that some of my old friends have hung in 
                there and been successful.</p>
                <p>Was I a good player? You can listen to this recording of me playing J. S. Bach, <em>Prélude, Fugue and Allegro, BWV 998</em> at a public 
                recital in 1987, and decide for yourself.</p>
                <div class="text-center mb-2">
                    <audio src="media/prelude-fugue-and-allegro.mp3" controls></audio>
                </div>
                <p>I don't think a musician can ever stop being a musician in some sense. Music is not just a source of enjoyment; 
                it is vital in an almost biological sense. And so, after a 30 year hiatus, I decided to pick up the guitar 
                again. But not classical, no. It would be too difficult to regain a level high enough to make it satisfying. Instead I 
                decided to get some instruction in jazz and have fun, liberated from the need to achieve anything. So here's 
                <a href="https://lbry.tv/@mintz:3/so-what.take-01.2020-04-09-220005:e">a little video of me having fun</a> 
                making music once again (albeit recorded on the crappiest of equipment).</p>
                <h4>want more of my bloviations?</h4>
                The blog is at <a href="https://blog.vernontbludgeon.com/">blog.vernontbludgeon.com</a>
            </main>                    
        </div>
        <div class="row">
            <footer class="col-md-7 offset-md-2 text-center border-bottom">david@davidmintz.org &bull; 201 978-0608 &bull; <a href="gpg.txt">PGP key</a></footer>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script src="js/jquery-3.5.1.min.js"></script>
      <script>
      $(function(){ 
          window.setInterval(()=>{
            $.get("/weather.php")
            .then(html=>$("#weather").next("p").html(html))
            .fail(()=>{});
          },300000)
      });
      </script>
  </body>
</html>
