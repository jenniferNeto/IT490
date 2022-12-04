<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("dmz.ini","dbServer");

$request = array();
$request['type'] = "getFavs";
$request['uid'] = 1;
$response = $client->send_request($request);

$prodArray = $response;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Boutique | Ecommerce bootstrap template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- gLightbox gallery-->
        <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
        <!-- Range slider-->
        <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
        <!-- Choices CSS-->
        <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
        <!-- Swiper slider-->
        <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
        <!-- Google fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/favicon.png">
      </head>
      <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js">
      </script>
	<script>
        $(document).ready(function(){
        var id = sessionStorage.getItem("id");
        $.ajax({
        type:"post",
                url:"sessionCheck.php",
                data:{
                "seshid": id
                },
                complete: function(){
                        var r = sessionStorage.getItem('checkResponse');
                        if(r){
                                window.location.replace("login.html");
                        }
                }
        })
                
        });


        </script>

      <script type='text/javascript'>
        $(document).ready(function(){
          $('.favBtn').click(function(){         
            var postid = $(this).attr('data-pName');
            //alert (postid);
            $.ajax({
              type     : 'post',
              url      : 'addFav.php',
              data     : {
                  "pName": postid
              },
              success : function(data) {
                 //alert("fuckin worked");
              },
              error(){
                alert("error fuckin error");
              } 
            }); 
          });
        });
      </script>
    <body>
        <div class="page-holder">
            <!-- navbar-->
            <header class="header bg-white">
              <div class="container px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="fw-bold text-uppercase text-dark">Bouge</span></a>
                  <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                      <li class="nav-item">
                        <!-- Link--><a class="nav-link" href="home.php">Catalog</a>
                      </li>
                      <li class="nav-item">
                        <!-- Link--><a class="nav-link" href="myFeed.php">My Feed</a>
                      </li>
                      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Closet</a>
                        <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="profile.php">My Favs</a><a class="dropdown-item border-0 transition-link" href="myOutfits.php">My Outfits</a><a class="dropdown-item border-0 transition-link" href="createOutfit.php">Create Outfit</a></div>
                      </li>
                      <li class="nav-item">
			                  <!-- Link--><a class="nav-link" href="publicOutfits.php">Public Fits</a>
			                </li>
                      <li class="nav-item">
			                  <!-- Link--><a class="nav-link" href="forum.php">Forum</a>
			                </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">               
                      <li class="nav-item"><a class="nav-link" href="cart.html"> <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small class="text-gray fw-normal">(2)</small></a></li>
                      <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small class="text-gray fw-normal"> (0)</small></a></li>
                      <li class="nav-item"><a class="nav-link" href="login.html"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </header>
        </div>
        <div class="container py-5">
        <header class="text-center">
          <h2 class="h5 text-uppercase mb-4">My Favs</h2>
          </header>
        <div class="row">
            <?php
            for ($x = 0; $x <= count($prodArray)-1; $x++) {
              echo '<div class="col-lg-4 col-sm-6">
                <div class="product text-center">
                  <div class="mb-3 position-relative">
                    <div class="badge text-white bg-"></div><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="'.$prodArray['prod'.$x]['img_URL'].'" alt="..."></a>
                    <div class="product-overlay">
                      <ul class="mb-0 list-inline">
                      <li class="list-inline-item m-0 p-0">
                      <a class="btn btn-sm btn-outline-dark favBtn" data-pName="'.$prodArray['prod'.$x]['name'].'" ><i class="far fa-heart"></i>
                      </a></li>
                      </ul>
                    </div>
                  </div>
                  <h6> <a class="reset-anchor" href="">'.$prodArray['prod'.$x]['name'].'</a></h6>
                  <p class="small text-muted">$250</p>
                </div>
              </div>';
              } 
            ?>
            
        </div>
        </div>


        <!-- JavaScript files-->
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="js/front.js"></script>
      <!-- Nouislider Config-->
      <script>
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
              to: function ( value ) {
                return '$' + value;
              },
              from: function ( value ) {
                return value.replace('', '');
              }
            }
        });
        
      </script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </body>
</html>
