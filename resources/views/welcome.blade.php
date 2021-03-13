@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<div class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <span class="brand-text font-weight-light">MarKost</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('register')}}" class="nav-link">Daftar</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main>
            <section>
                <div class="container wow fadeIn">
                    <div id="oleezLandingCarousel" class="oleez-landing-carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{asset('/images/1.jpg')}}" alt="First slide" class="w-100">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>MarKost</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>Kost Recommendations</span></h2>
                                <a href="{{route('login')}}" class="carousel-item-link" data-animation="animated fadeInRight">Login to Findout</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('/images/2.jpg')}}" alt="Second slide" class="w-100" srcset="">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>MarKost</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>Fast Solution</span></h2>
                                <a href="{{route('login')}}" class="carousel-item-link" data-animation="animated fadeInRight">Login to Findout</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('/images/3.jpg')}}" alt="Third slide" class="w-100">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>MarKost</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>The Best Choice</span></h2>
                                <a href="{{route('login')}}" class="carousel-item-link" data-animation="animated fadeInRight">Login to Findout</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('/images/4.jpg')}}" alt="Fourth slide" class="w-100">
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInRight"><span>MarKost</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>Digital agency</span></h2>
                                <a href="{{route('login')}}" class="carousel-item-link" data-animation="animated fadeInRight">Login to Findout</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="oleez-footer wow fadeInUp">
            <div class="container">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-md-6">
                            <img  src="{{asset('/images/LogoFooter.png')}}" alt="oleez" class="footer-logo">
                            <p class="footer-intro-text">Don't be shy, get in touch with us and create the world again!</p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">PHONE</h6>
                                <p class="widget-content">(0331) 6272431</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">ENQUIRUES</h6>
                                <p class="widget-content">Markost@yahoo.id</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">ADDRESS</h6>
                                <p class="widget-content">Jalan Kalimantan Tegal Boto No. 34<br>Kabupaten Jember</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">WORK HOURS</h6>
                                <p class="widget-content">Weekdays: 09:00 - 18:00 <br> Weekends: 11:00 - 17:00</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection