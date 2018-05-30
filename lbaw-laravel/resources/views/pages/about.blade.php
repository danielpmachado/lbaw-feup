@extends('layouts.app')

@section('content')
<div id="about" class="container text-center">
    <div class="row text-center description-row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <h1 id="about-title" class="container text-center">Tech4U</h1>
            <p>We at Tech4U pride ourselves with being one of the fastest growing ecommerce platforms for high quality products. We strive to make you happy.</p>
            <p>Tech4U specializes in consumer electronics and gadgets. Our online catalog is constantly expanding with the very latest and the coolest gadgets added every day to ensure you get your tech fix.</p>
            <p>We take your satisfaction seriously. We provide a professional, dedicated service for every single customer regardless of order size.</p>
        </div>
        <div class="col-md-2">
        </div>
    </div>


    <div id="info" class="container text-center">
        <div class="row info-row">
            <div class="col-md-4 info-point">
                <i class="fa fa-thumbs-up"></i>
                <p><span class="category">Quality</span> is the cornerstone of our activities and internal processes</p>
            </div>
            <div class="col-md-4 info-point">
                <i class="fa fa-lock"></i>
                <p>We take your <span class="category">security</span> to heart. All your information is confidential</p>
            </div>
            <div class="col-md-4 info-point">
                <i class="fa fa-dollar-sign"></i>
                <p>We analyze the market to give you the <span class="category">lowest prices</span> for all products</p>
            </div>
        </div>

        <div class="row info-row">
            <div class="col-md-4 info-point dedication">
                <i class="fa fa-heart"></i>
                <p>You can count on our <span class="category">dedication</span> to give you the best possible experience</p>
            </div>
            <div class="col-md-4 info-point hard-work">
                <i class="fa fa-wrench"></i>
                <p>We <span class="category">work hard</span> to always keep all the information up to date</p>
            </div>
            <div class="col-md-4 info-point support">
                <i class="fa fa-medkit"></i>
                <p>If you have any questions, do not hesitate to contact us, we will give you <span class="category">work hard</span> for life.</p>
            </div>
        </div>
    </div>

</div>

<section class="team">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="col-lg-12">
                    <h2 class="description text-center" id="team">Our team</h2>
                    <div class="row pt-md">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
                            <div class="img-box rounded">
                                <img src="images/daniel2.jpg" class="img-fluid rounded">
                                <ul class="text-center">
                                    <a href="https://www.facebook.com/daniel.pmachado" target="_blank"><li><i class="fab fa-facebook"></i></li></a>
                                    <a href="https://www.instagram.com/daniel.pmachado/" target="_blank"><li><i class="fab fa-instagram"></i></li></a>
                                    <a href="https://github.com/dolfander" target="_blank"><li><i class="fab fa-github"></i></li></a>
                                </ul>
                            </div>
                            <h1>Daniel Machado</h1>
                            <h2>Co-founder/ Operations</h2>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
                            <div class="img-box">
                                <img src="images/david2.jpg" class="img-fluid rounded">
                                <ul class="text-center">
                                    <a href="https://www.facebook.com/david.falcao2" target="_blank"><li><i class="fab fa-facebook"></i></li></a>
                                    <a href="https://www.instagram.com/davidrsfalcao/" target="_blank"><li><i class="fab fa-instagram"></i></li></a>
                                    <a href="https://github.com/davidrsfalcao" target="_blank"><li><i class="fab fa-github"></i></li></a>
                                </ul>
                            </div>
                            <h1>David Falcão</h1>
                            <h2>Co-founder/ Projects</h2>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
                            <div class="img-box">
                                <img src="images/troca2.jpg" class="img-fluid rounded">
                                <ul class="text-center">
                                    <a href="https://www.facebook.com/zepedro.machado.9" target="_blank"><li><i class="fab fa-facebook"></i></li></a>
                                    <a href="https://www.instagram.com/zepedromachado97/" target="_blank"><li><i class="fab fa-instagram"></i></li></a>
                                    <a href="https://github.com/TrocaTudo95" target="_blank"><li><i class="fab fa-github"></i></li></a>
                                </ul>
                            </div>
                            <h1>José Pedro Machado</h1>
                            <h2>Co-founder/ Marketing</h2>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
                            <div class="img-box">
                                <img src="images/sofia2.jpg" class="img-fluid rounded">
                                <ul class="text-center">
                                    <a href="https://www.facebook.com/kyahraa" target="_blank"><li><i class="fab fa-facebook"></i></li></a>
                                    <a href="https://www.instagram.com/sofiacbalves/" target="_blank"><li><i class="fab fa-instagram"></i></li></a>
                                    <a href="https://github.com/Kyahra" target="_blank"><li><i class="fab fa-github"></i></li></a>
                                </ul>
                            </div>
                            <h1>Sofia Alves</h1>
                            <h2>Designer</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container fluid">
        <h2 class="text text-center">Contact Us</h2>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h5>+1 555 123456</h5>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5> Rua Dr Roberto Frias, FEUP </h5>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-envelope"></i>
                        <h5>support@tech4u.com</h5>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


    <div id="map" style="width:100%;height:400px;"></div>

    <script>
    function myMap() {
        var mapCanvas = document.getElementById("map");
        var mapOptions = {
            center: new google.maps.LatLng(41.1780, -8.5980), zoom: 15
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
    }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCkTadtGML5L8mAOKPp79NUcQ9etEh6KE&callback=myMap"></script>

    @endsection
