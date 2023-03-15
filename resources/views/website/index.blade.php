<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miami Mix Kings</title>
    <link href="{{url('/').'/website/scss/bootstrap.min.css'}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/').'/website/scss/mmenu-light.css'}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/').'/website/scss/owl.carousel.min.css'}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{url('/').'/website/scss/aos.css'}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/').'/website/scss/owl.theme.default.min.css'}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/').'/website/scss/main.css'}}" rel="stylesheet">
    <link rel="stylesheet" href="./css/app.css" rel="stylesheet">
    <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
    <script src="https://cdn.socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>

</head>
<body>
    
    <header class="sticky-header">
            <div class="header">
                <div class="desktop-nav">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container">
                        <div class="d-flex justify-content-between w-100 align-items-center">
                            <div class="">
                                <a class="navbar-brand logo" href="#">
                                    <img src="assets/images/logo.png" alt="">
                                </a>
                            </div>
                            <div>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                  <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    
                                    <li class="nav-item">
                                      <a class="nav-link" href="#live-stream">Live Streaming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#chat">Chat</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#radio">Radio</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link active" href="#gallery">Sponsor</a>
                                    </li>
                                    <!-- <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                      </a>
                                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                      </ul>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                    </li> -->
                                  </ul>
                                  <!-- <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                  </form> -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </nav>
                </div>
                <div class="mobile-nav">
                    <a class="navbar-brand" href="index.html">
                        <div class="mob-main-logo-costome">
                            <img src="assets/images/logo.png" alt="">
                        </div>
                    </a>
                    <a style="font-size:30px;cursor:pointer;" href="#my-menu" class="toggle-btn">&#9776;</a>
                    <nav id="my-menu">
                        <ul>
                            <li><a class="nav-link" href="#live-stream">Live Streaming</a></li>
                            <li><a class="nav-link" href="#chat">Chat</a></li>
                            <li><a class="nav-link" href="#radio">Radio</a></li>
    
                            <!-- <li><a href="">BLOG</a></li> -->
                            <li><a class="nav-link active" href="#gallery">Sponsor</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
    </header>
    <main>
        <section class="main-banner-section" style="background-image: url(website/img/website.png); background-size: cover;     background-position: center;">
            
        </section>
        <section class="music-section bg-dark py-5" id="gallery">
          {{-- <h1 class="display-3 text-center mb-4" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;">Promotion</h1> --}}
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="music-section_tab" data-aos="fade-up">
                    <div class=" slider-1 owl-carousel owl-theme">
                      @foreach($promotion as $sponser)
                        <div class="item">
                          <a href="{{$sponser->link != '' ? $sponser->link : '#'}}">
                            <div class="card">
                                <img src="{{url('/').'/storage/image/'.$sponser->image}}" alt="banner" class="img-fluid">
                            </div>
                          </a>
                        </div>
                      @endforeach
                        {{-- <div class="item">
                            <div class="card">
                                <img src="website/img/banner-2.jpg" alt="banner" class="img-fluid">
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="website/img/banner-3.jpg" alt="banner" class="img-fluid">
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="website/img/banner-4.jpg" alt="banner" class="img-fluid">
                            </div>
                        </div> --}}
                        
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- slider images -->
        <section class="slider-section bg-dark py-5" id="slider">
          {{-- <h1 class="display-3 text-center mb-4" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;">Slider</h1> --}}
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="music-section_tab" data-aos="fade-up">
                    <div class="slider-2 owl-carousel owl-theme">
                      @foreach($slider as $sponser)
                        <div class="item">
                          <a href="{{$sponser->link != '' ? $sponser->link : '#'}}">
                            <div class="card">
                                <img src="{{url('/').'/storage/image/'.$sponser->image}}" alt="banner" class="img-fluid">
                            </div>
                          </a>
                        </div>
                      @endforeach                     
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end slider -->
        <section class="live-streaming-section" id="live-stream" style="background: #000; text-align:center;">
          <div class="container">
          @if($video->status == 1)
            <div class="embed-responsive embed-responsive-16by9">
              <video id="my_video_1" class="video-js vjs-fluid vjs-default-skin" controls preload="auto"
              data-setup='{}' webkit-playsinline="true" playsinline="true">
                <source src="{{$video->link}}" type="application/x-mpegURL">
              </video>
            </div>
          @else
          <div class="embed-responsive embed-responsive-16by9 bg-black">
            <img src="{{url('/').'/assets/images/offline.jpeg'}}" class="img-fluid">
          </div>
          @endif
          </div>
        </section>
        <section class="chat-section bg-dark pt-5" id="chat">
            <h1 class="display-3 text-center mb-4" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;">Chat</h1>
            <div class="chat-section_chat-box container">
                <div class="single-chat-tab">
                    <!-- <div class="chat-header">
                      <div class="media">
                        <div class="user-dp position-relative">
                          <img class="" src="https://github.com/farhansaqib444/codepen/blob/master/services-icon-2.png?raw=true" alt="img">
                          <span class="user-online"></span>
                        </div>
                        <div class="media-body">
                          <h5 class="mt-0">Elizabeth Vargas</h5>
                        </div>
                      </div>
                    </div> -->
                    <div class="chat-body" id="chat-body">
                      @foreach($chat as $value)
                      <div class="message-content receiver">
                        <label for="">{{$value->date}}</label>
                        <div class="msg-block">
                          <h5 class="mb-2">{{$value->username}}</h5>
                          <p>
                            {{$value->message}}
                          </p>
                        </div>
                      </div>
                      @endforeach
                      {{-- <div class="message-content sender">
                        <label for="">11:33 PM, Yesterday</label>
                        <div class="msg-block">
                          <h5 class="mb-2">Jhon Doe</h5>
                          <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                          </p>
                        </div>
                      </div>
                      <div class="message-content sender">
                        <label for="">11:33 PM, Yesterday</label>
                        <div class="msg-block">
                          <h5 class="mb-2">Jhon Doe</h5>
                          <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                          </p>
                        </div>
                      </div>
                      <div class="message-content sender">
                        <label for="">11:33 PM, Yesterday</label>
                        <div class="msg-block">
                          <h5 class="mb-2">Jhon Doe</h5>
                          <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                          </p>
                        </div>
                      </div>
                      <div class="message-content receiver">
                        <label for="">11:33 PM, Yesterday</label>
                        <div class="msg-block">
                          <h5 class="mb-2">Jhon Doe</h5>
                          <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                          </p>
                        </div>
                      </div>
                      <div class="message-content sender">
                        <label for="">11:33 PM, Yesterday</label>
                        <div class="msg-block">
                          <h5 class="mb-2">Jhon Doe</h5>
                          <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                          </p>
                        </div>
                      </div> --}}
                    </div>
                    <div class="chat-footer">
                      <div class="input-group md-form d-flex form-sm form-2 pl-0">
                        <div class="d-block" style="width: 90%;">
                          <input class="form-control mt-0 mb-2 py-1 red-border" id="username" type="text" style="border-bottom: 1px solid #fff; border-top: none; border-right: none; border-left: none; border-radius: 0px;" placeholder="Enter Your Name...">
                          <input class="form-control my-0 py-1 red-border" id="message" type="text" placeholder="Write a message...">
                        </div>
                        <div class="input-group-append" style="width: 10%;">
                          <button class="btn input-group-text red w-100 lighten-3 text-center justify-content-center d-flex" id="submit">
                            {{-- <i class="material-icons">Send</i>  --}}
                            <i class="far fa-paper-plane"></i>

                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </section>
        <section class="radio-section" id="radio">
            <div class="container">
              <div class="d-flex row">
                <div class="radio-container" data-aos="zoom-in">
                    <div class="radio-header" style="opacity: 0.9">
                      <img src="{{url('/').'/assets/images/MMR_TROPICAL.png'}}" height="200" width="300">
                      {{-- <div class="radio-name">MMK Tropical</div> --}}
                      {{-- <div class="current-presenter">Current presenter: Adam</div> --}}
                    </div>
                    <div class="radio-body">
                      <div class="shine"></div>
                      <div class="current-song">
                        {{$radio->radio1_name}}
                      </div>
                      <div class="radio-buttons">
                        <audio id="radioPlayer" src="{{$radio->radio1_url}}" autoplay="autoplay"></audio>
                        <div class="button button-play"><i class="fa fa-pause" aria-hidden="true" id="radio-play"></i></div>
                        <div class="button button-stop"><i class="fa fa-stop" aria-hidden="true" id="radio-pause"></i></div>
                        {{-- <div class="button button-request">Request</div> --}}
                      </div>
                      <div class="wave-bars">
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                        <div class="wave wave-1"></div>
                        <div class="wave wave-2"></div>
                        <div class="wave wave-3"></div>
                        <div class="wave wave-4"></div>
                        <div class="wave wave-5"></div>
                      </div>
                    </div>
                </div>
                {{-- <div class="radio-container" data-aos="zoom-in">
                  <div class="radio-header" style="opacity: 0.9">
                    <img src="{{url('/').'/assets/images/MMR_URBANA.png'}}" height="200" width="300">
                    {{-- <div class="radio-name">MMK Urbana</div> --}}
                     {{-- <div class="current-presenter">Current presenter: Adam</div>  
                  </div>
                  <div class="radio-body">
                    <div class="shine"></div>
                    <div class="current-song">
                      {{$radio->radio2_name}}
                    </div>
                    <div class="radio-buttons">
                      <audio id="radioPlayer1" src="{{$radio->radio2_url}}" autoplay="autoplay"></audio>
                      <div class="button button-play-2"><i class="fa fa-pause" aria-hidden="true" id="radio2-play"></i></div>
                      <div class="button button-stop-2"><i class="fa fa-stop" aria-hidden="true" id="radio2-pause"></i></div>
                      {{-- <div class="button button-request">Request</div> 
                    </div>
                    <div class="wave-bars">
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                      <div class="wave1 wave-1"></div>
                      <div class="wave1 wave-2"></div>
                      <div class="wave1 wave-3"></div>
                      <div class="wave1 wave-4"></div>
                      <div class="wave1 wave-5"></div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
        </section>
        <section class="music-section bg-dark py-5" id="gallery">
          <h1 class="display-3 text-center mb-4" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;">Sponsor</h1>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="music-section_tab" data-aos="fade-up">
                    <div class=" slider-1 owl-carousel owl-theme">
                      @foreach($sponsers as $sponser)
                        <div class="item">
                          <a href="{{$sponser->link != '' ? $sponser->link : '#'}}">
                            <div class="card">
                                <img src="{{url('/').'/storage/image/'.$sponser->image}}" alt="banner" class="img-fluid">
                            </div>
                          </a>
                        </div>
                      @endforeach
                        {{-- <div class="item">
                            <div class="card">
                                <img src="website/img/banner-2.jpg" alt="banner" class="img-fluid">
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="website/img/banner-3.jpg" alt="banner" class="img-fluid">
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <img src="website/img/banner-4.jpg" alt="banner" class="img-fluid">
                            </div>
                        </div> --}}
                        
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>
    <footer>
      <section class="footer">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-5">
              <div class="w-50 mx-auto pt-5">
                <img src="assets/images/logo.png" alt="" class="img-fluid">
              </div>
              <div class="d-flex my-4">
                {{-- <div class="text-white">
                  <a href="#" style="color: #f8a715;" class="mx-2">Privacy Policy</a> | <a href="#" class="mx-2" style="color: #f8a715;">Terms And Condition</a> | <a href="#" style="color: #f8a715;" class="mx-2">Request Mixes</a>
                </div> --}}
              </div>
              <div class="mb-5 text-center social-icon">
                <a href="{{$social->facebook}}" class="text-white mx-2" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="{{$social->mmk_instagram}}" class="text-white mx-2" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="{{$social->mmradio_instagram}}" class="text-white mx-2" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="{{$social->youtube}}" class="text-white mx-2" style="background: -webkit-linear-gradient(#B79031, #B79031); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">
                  <i class="fab fa-youtube"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="copyright bg-dark text-white text-center py-2 border-top">
          <span>COPYRIGHT 2023 BY THE MIX KINGS</span>
      </section>
    </footer>
    <script src="./js/app.js"></script>
    <script src="{{url('/').'/website/js/jquery-3.2.1.slim.min.js'}}"></script>
    <script src="{{url('/').'/website/js/bootstrap.bundle.min.js'}}"></script>
    <script src="{{url('/').'/website/js/popper.min.js'}}"></script>
    <script src="{{url('/').'/website/js/owl.carousel.min.js'}}"></script>
    <script src="{{url('/').'/website/js/aos.js'}}"></script>
    <script src="{{url('/').'/website/js/mmenu-light.js'}}"></script>
    <script src="{{url('/').'/website/js/bootstrap.min.js'}}"></script>
<script>
    document.addEventListener(
        "DOMContentLoaded", () => {
            const menu = new MmenuLight(
                document.querySelector("#my-menu"),
                "(max-width: 990px)"
            );

            const navigator = menu.navigation();
            const drawer = menu.offcanvas();

            document.querySelector("a[href='#my-menu']")
                .addEventListener("click", (evnt) => {
                    evnt.preventDefault();
                    drawer.open();
                });
        }
    );
</script>
<script>
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 330) {
        $('.sticky-header').addClass('fixed');
        }
        else {
        $('.sticky-header').removeClass('fixed');
        }
    });
</script>
<script>
  $(document).ready(function(){
    let name = window.localStorage.getItem('username');
    if(name != null){
      $("#username").val(name);
    }
    
    function sendMessage(){
      let message = $("#message").val();
      alert(message);
    }
  });
</script>
<script>
    $('.slider-1').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    animateOut: 'fadeOut',
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('.slider-2').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    animateOut: 'fadeOut',
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});
</script>
<script>
   let status = "{{ $video->status }}";
   if(status != 0){
    var players = videojs('my_video_1');
 // players.play();
   }
  
var player = document.getElementById('radioPlayer');
var radioVolume = document.getElementById('radioVol');
var userVolume = 50;
var player1 = document.getElementById('radioPlayer1');
$('.button-play').click(function() {
  icon = $(this).find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    // if (player.src != "http://comet.shoutca.st:8967/stream"){
		//   player.src = "http://comet.shoutca.st:8967/stream";
    // }
		player.pause();
    waveAfterWave();
  } else {
    icon.removeClass('fa-play');
    icon.addClass('fa-pause');
    player.play();
    player1.pause();
    $('.wave').removeClass('no-animation');
  }

  icon = $('.button-play-2').find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    player1.pause();
    //player1.src = {!! json_encode($radio->radio2_url ) !!};
  }
  waveAfterWave1();
  players.pause();
});

$('.button-stop').click(function() {
  icon = $('.button-play').find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    player.src = {!! json_encode($radio->radio1_url ) !!};
  }
  waveAfterWave();
});

//new 
$('.button-play-2').click(function() {
  icon = $(this).find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    // if (player.src != "http://comet.shoutca.st:8967/stream"){
		//   player.src = "http://comet.shoutca.st:8967/stream";
    // }
		player1.pause();
    waveAfterWave1();
  } else {
    icon.removeClass('fa-play');
    icon.addClass('fa-pause');
    player1.play();
    player.pause();
    $('.wave1').removeClass('no-animation');
  }

  icon = $('.button-play').find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    player.pause();
  }
  waveAfterWave();
  players.pause();
});

$('.button-stop-2').click(function() {
  icon = $('.button-play-2').find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    player1.pause();
    //player1.src = {!! json_encode($radio->radio2_url ) !!};
  }
  waveAfterWave1();
});


function waveAfterWave() {
  $('.wave').each(function(){
    height = $(this).height();
    $(this).css('height', height);
  });
  $('.wave').addClass('no-animation');
};

function waveAfterWave1() {
  $('.wave1').each(function(){
    height = $(this).height();
    $(this).css('height', height);
  });
  $('.wave1').addClass('no-animation');
};

function sendMessage(){
      let message = $("#message").val();
      alert(message);
    }

      player.pause();
      player1.pause();
      $('.button-play').click();

      const video = document.querySelector('video');

video.onplay = (event) => {
  icon = $('.button-play').find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    player.pause();
  }
  waveAfterWave();


  //player 2
  icon = $('.button-play-2').find('i');
  
  if (icon.hasClass('fa-pause')) {
    icon.removeClass('fa-pause');
    icon.addClass('fa-play');
    player1.pause();
    //player1.src = {!! json_encode($radio->radio2_url ) !!};
  }
  waveAfterWave1();

};

</script>
<script>
  $("#chat-body").scrollTop($("#chat-body")[0].scrollHeight);
</script>
<script>
  AOS.init();
</script>
</body>
</html>