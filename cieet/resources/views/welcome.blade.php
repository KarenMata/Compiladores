@extends('layouts.app')

@section('title', 'Main page')

@section('content')

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-121642637-2');
</script>

<script>
    const parallaxEls = document.querySelectorAll("[data-speed]");
 
    window.addEventListener("scroll", scrollHandler);

    function scrollHandler() {
        for (const parallaxEl of parallaxEls) {
            const direction = parallaxEl.dataset.direction == "up" ? "-" : "";
            const transformY = this.pageYOffset * parallaxEl.dataset.speed;
            if (parallaxEl.classList.contains("banner-title")) {
                parallaxEl.style.transform = `translate3d(0,${direction}${transformY}px,0) rotate(-6deg)`;
            } else if (parallaxEl.classList.contains("banner-subtitle")) {
                parallaxEl.style.transform = `translate3d(0,${direction}${transformY}px,0) rotate(-3deg)`;
            } else {
                parallaxEl.style.transform = `translate3d(0,${direction}${transformY}px,0)`;
            }
        }
    }
</script>

<!-- cover -->
<section class="p-0" id="intro">
    <div class="swiper-container swiper-container-half text-white"
         data-top-top="transform: translateY(0px);"
         data-top-bottom="transform: translateY(250px);">
        <div class="swiper-wrapper">
            <div class="swiper-slide vh-100">
                <div class="image image-overlay" style="background-image:url({{asset('imag/Logos-01.png')}}); background-attachment: fixed;"></div>
                <div class="caption">
                    <div class="container">
                        <div class="row justify-content-center vh-100">
                            <div class="col-md-8 align-self-center text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <div class="mouse"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / cover -->

<!-- presentation -->
<section class="section-lg vh-100" id="eins">
    <div class="container">
        <div class="row text-center text-lg-left">
            <div class="col-12 col-lg-9">
                <div class="row justify-content-end">
                    <div class="col-lg-8">
                        <h2>Quiénes somos</h2>
                    </div>
                </div>
                <div class="row gutter-0 justify-content-between align-items-center">
                    <div class="col-md-7">
                        <p class="lead">
                            Táctica Centro de Investigación Empresarial y Estadística A.C. opera desde 2009, es un  Centro de investigación dedicado a brindar soluciones basado en metodologías de investigación, desarrollo tecnológico, innovación y aplicación de herramientas para el desarrollo social y de comunidades a través de proyectos de crecimiento empresarial y social en México.
                        </p>
                    </div>
                    <div class="col-md-4 text-center text-md-left">
                        <span class="eyebrow mb-1 text-green"></span>
                        <p class="lead">
                            CIEET es facilitador dentro de proyectos de sector publico- privado con herramientas, metodología y conocimiento para implementar y desarrollar sinergias entre empresas/organizaciones de un territorio para la eficiencia de los recursos y mejora de la competitividad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / presentation -->

<!-- gallery -->
<section class="bg-light" id="zwei">
    <div class="container gallery vh-100">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2><b>Nuestros Proyectos</b></h2>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-12">
                <!--div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="10000">
                            <figure class="photo equal equal-short">
                                <a href="{{asset('imag/FotosCIEET/fc0.jpg')}}"
                                           style="background-image: url({{asset('imag/FotosCIEET/fc0.jpg')}});">
                                </a>
                            </figure>
                        </div>
                        <div class="carousel-item" data-interval="2000">
                            <figure class="photo equal">
                                <a href="{{asset('imag/FotosCIEET/fc1.jpg')}}"
                                           style="background-image: url({{asset('imag/FotosCIEET/fc1.jpg')}});">
                                </a>
                            </figure>
                        </div>
                        @for ($i = 2; $i < 6; $i++)
                            <div class="carousel-item">
                                @if($i%2 == 0)
                                    <figure class="photo equal equal-short">
                                @else
                                    <figure class="photo equal">
                                @endif
                                        <a href="{{asset('imag/FotosCIEET/fc'.$i.'.jpg')}}"
                                           style="background-image: url({{asset('imag/FotosCIEET/fc'.$i.'.jpg')}});">
                                        </a>
                                    </figure>
                            </div>
                        @endfor
                    </div>
                    <!--a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div-->
                <div id="carousel" class="visible align-bottom carousel slide" data-ride="carousel" data-items="[2,2,2]" data-margin="10" data-loop="true" data-autoplay="true">
                    <div class="carousel-inner">
                        @for ($j = 0; $j < 6; $j++)
                            @if($j == 0)
                                <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                            @endif
                                    <div class="row">
                                        @for ($i = $j*3; $i < $j*3+3; $i++)
                                            <div class="col">
                                                @if($i%2 == 0)
                                                    <figure class="photo equal equal-short">
                                                @else
                                                    <figure class="photo equal">
                                                @endif
                                                        <a href="{{asset('imag/FotosCIEET/fc'.$i.'.jpg')}}"
                                                           style="background-image: url({{asset('imag/FotosCIEET/fc'.$i.'.jpg')}});">
                                                        </a>
                                                    </figure>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-12">
                <div id="carousel_2" class="visible carousel slide" data-ride="carousel"  data-items="[2,2,2]" data-margin="10" data-loop="true" data-autoplay="true" data-rtl="true">
                    <div class="carousel-inner">
                        @for ($j = 0; $j < 8; $j++)
                            @if($j == 0)
                                <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                            @endif
                                    <div class="row">
                                        @for ($i = $j*2+18; $i < $j*2+20; $i++)
                                            <div class="col">
                                                @if($i%2 == 0)
                                                    <figure class="photo equal">
                                                @else
                                                    <figure class="photo equal equal-short">
                                                @endif
                                                    @if($i == 33)
                                                        <a href="{{asset('imag/FotosCIEET/fc3.jpg')}}"
                                                           style="background-image: url({{asset('imag/FotosCIEET/fc3.jpg')}});">
                                                        </a>
                                                    @else
                                                        <a href="{{asset('imag/FotosCIEET/fc'.$i.'.jpg')}}"
                                                           style="background-image: url({{asset('imag/FotosCIEET/fc'.$i.'.jpg')}});">
                                                        </a>
                                                    @endif
                                                    </figure>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / gallery -->

<!-- facility -->
<section id="drei" class="vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-8">
                        <span class="eyebrow text-green mb-2"><h3>Nuestras áreas de acción</h3></span>
                        <p class="lead text-black">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Proyectos productivos del sector agroindustrial </li>
                                <li class="list-group-item"> Proyectos de transformación </li>
                                <li class="list-group-item"> Proyectos estratégicos </li>
                                <li class="list-group-item"> Vinculación estratégica </li>
                                <li class="list-group-item"> Proyectos tecnológicos </li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / facility -->

<!-- map -->
<section class="py-0" id="vier">
    <div id="map" class="vh-100">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d734.9664843035794!2d-100.97799867323536!3d22.14851259555092!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842aa200e44fc441%3A0x3f54bea21b3a4e6b!2sHermenegildo%20Galeana%20477%2C%20Centro%20Historico%2C%2078000%20San%20Luis%2C%20S.L.P.!5e0!3m2!1ses-419!2smx!4v1605900882516!5m2!1ses-419!2smx" width="100%" height="100%" frameborder="1" style="border:2px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</section>
<!-- / map -->

@endsection