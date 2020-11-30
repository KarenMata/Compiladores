@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <style>


        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons 
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }*/

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container2 {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 50%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)} 
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)} 
            to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
    <div id="wrapper">

        <!-- One -->
        <section id="one" class="wrapper style2 spotlights " style="color:#30303e;">
            <section>
                <a href="#" class="image col-lg-4 col-md-4 col-sm-4" style="padding-left: 0px; overflow: hidden;"><img src="{{asset('images/personal-1.png')}}" alt="" data-position="center center" /></a>
                <div class="content">
                    <div class="inner">
                        <h2 style="color:#30303e;">Sistemas Informáticos</h2>
                        <p>En CIEET contamos con los servicios de desarrollo de sistemas informáticos, contamos con varios proyectos que nos avalan en el ramo de las tecnologías.</p>
                        <ul class="actions">
                            <li><a href="#" class="button" style="color:#30303e;">Ver más</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section>
                <a href="#" class="image col-lg-4 col-md-4 col-sm-4" style="padding-left: 0px; overflow: hidden;"><img src="{{asset('images/personal-2.png')}}" alt="" data-position="top center" /></a>
                <div class="content">
                    <div class="inner">
                        <h2 style="color:#30303e;">Sector Agroalimentario</h2>
                        <p>En asociación con AINVA, CAINCO, la Unión Europea, Al Invest y Cainco, se formó una industria agrolimentaria fortalecidada como un motor de desarrollo económico y social para los municipios del Valle de Arista.</p>
                        <ul class="actions">
                            <li><a href="#" class="button" style="color:#30303e;">Ver más</a></li>
                        </ul>
                    </div>
                </div>
            </section>
    <!--						<section>
                    <a href="#" class="image"><img src="{{asset('images/personal-4.png')}}" alt="" data-position="25% 25%" /></a>
                    <div class="content">
                            <div class="inner">
                                    <h2 style="color:#30303e;">Servicio</h2>
                                    <p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
                                    <ul class="actions">
                                            <li><a href="#" class="button" style="color:#30303e;">Ver más</a></li>
                                    </ul>
                            </div>
                    </div>
            </section>-->
        </section>

        <!-- Two -->
        <section id="two" class="wrapper style2 fade-up" >
            <div class="inner" style="color:#fff;">
                <h2 style="color:#000; font-family:Times New Roman; border-bottom: 1px dotted #000; line-height: 1.6;">Proyectos</h2>
                <p style="color:#000;">Se han realizado diversos proyectos en los cuales se ha brindado el apoyo a empresas rurales y de los sectores sociales 
                    a través de la investigacion estadística, empresarial, consultoría empresarial o a organizaciones gubernamentales, desarrollo de 
                    estrategia empresarial, diseño de planes de negocio, diseño de manuales de operación, estudios de factibilidad, económicos y socioeconómicos.<br>
                    A continuación se muestran los principales proyetos que se han desarrollado.</p>
                <p><br></p>
                <div class="features">
                    <div class="timeline" style="color:#30303e; font-family: -WEBKIT-PICTOGRAPH;">
                        <div class="containertime left">
                            <div class="contentime">
                                <h3 style="color:#8caf54; text-align: right;">2011</h3>
                                <ul>
                                    <div class="timeline-image">
                                        <img class="rounded-circle img-fluid" src="{{asset('images/about/1.jpg')}}" alt="">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-body">
                                            <span style=" text-align: right;">
                                                <p style="color:#888888;"><i>- Evaluación del Impacto productivo de un invernadero.</i></p>
                                                <p><i>- Estudio de Impacto productivo de un viñedo.</i></p>
                                            </span>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="containertime right">
                            <div class="contentime">
                                <h3 style="color:#8caf54;">2012</h3>
                                <p style="color:#888888;"><i>- Manuales para productores y técnicos de diferentes hortalizas.</i></p>
                                <p><i>- Manuales de producción de chile, tomate y pepino en diferentes tecnologías de agricultura protegida.</i></p>
                            </div>
                        </div>
                        <div class="containertime left">
                            <div class="contentime">
                                <h3 style="color:#8caf54; text-align: right;">2013</h3>
                                <span style=" text-align: right;">
                                    <p style="color:#888888;"><i>- Proyecto para la instalación de una casa sombra en Palma de la Cruz, Soledad de Graciano Sánchez, S.L.P.</i></p>
                                    <p><i>- Análisis de Invernaderos en Villa de Arista y Recomendaciones.</i></p>
                                    <p style="color:#888888;"><i>- Proyecto Centro de Desarrollo Cafetalero Potosino.</i></p>
                                </span>
                            </div>
                        </div>
                        <div class="containertime right">
                            <div class="contentime">
                                <h3 style="color:#8caf54;">2014</h3>
                                <ul>
                                    <p style="color:#888888;"><i>- Producción de Pollo en el Municipio de Rayón.</i></p>
                                </ul>
                            </div>
                        </div>
                        <div class="containertime left">
                            <div class="contentime">
                                <h3 style="color:#8caf54; text-align: right;">2015</h3>
                                <span  style=" text-align: right;">
                                    <p style="color:#888888;"><i>- Proyecto estratégico para el desarrollo social de los productores de nopal tunero en la región altiplano.</i></p>
                                    <p><i>- Proyecto estratégico para el desarrollo social de los productores de lechuguilla en la región altiplano.</i></p>
                                    <p style="color:#888888;"><i>- Proyecto estratégico para el desarrollo social de los productores del agave mezcalero en la región altiplano.</i></p>
                                </span>
                            </div>
                        </div>
                        <div class="containertime right">
                            <div class="contentime">
                                <h3 style="color:#8caf54;">2016</h3>
                                <p style="color:#888888;"><i>- Producción de chile en invernadero.</i></p>
                                <p><i>- Producción de nopal verdura en macro tunel.</i></p>
                            </div>
                        </div>
                        <div class="containertime left">
                            <div class="contentime">
                                <h3 style="color:#8caf54; text-align: right;">2017</h3>
                                <span style=" text-align: right;">
                                    <p style="color:#888888;"><i>- Diseño de Proyectos culturales.</i></p>
                                    <p><i>- Producción de hortalizas en invernadero.</i></p>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>








        <section id="three" class="wrapper style2 fade-up"  style="background-color:#3f3f50; border-left:1px dotted #666684;-webkit-box-shadow: 0px 20px 109px 0px rgba(26,26,26,0.78);
                 -moz-box-shadow: 0px 20px 109px 0px rgba(26,26,26,0.78);
                 box-shadow: 0px 20px 109px 0px rgba(26,26,26,0.78);">
            <div class="inner" style="color:#fff;">                        
                <div class="container-fluid">
                    <h2 style="color:#fff; font-family:Times New Roman; border-bottom: 1px dotted #fff; line-height: 1.6;">Clientes</h2>
                    <div class="row no-gutter popup-gallery">
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/mestre.png')}}" style="border:0px;">
                                <img class="image img-fluid logos-emp" src="{{asset('images/logos clientes/blanco/mestre.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/sedea2.png')}}"  style="border:0px;">
                                <img class="image img-fluid logos-emp" src="{{asset('images/logos clientes/blanco/sedea2.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/vitivinicultores.png')}}"  style="border:0px;">
                                <img class="image img-fluid logos-emp" src="{{asset('images/logos clientes/blanco/vitivinicultores.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/sagarpa.png')}}"  style="border:0px;">
                                <img class="img-fluid logos-emp" src="{{asset('images/logos clientes/blanco/sagarpa.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/images/logos clientes/blanco/sedesore.png')}}"  style="border:0px;">
                                <img class="img-fluid logos-emp" src="{{asset('images/logos clientes/blanco/sedesore.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/conaza.png')}}" style="border:0px;">
                                <img class="img-fluid logos-emp" src="{{asset('images/logos clientes/blanco/conaza.png')}}" alt="">
                            </a>
                        </div>


                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/seccultura.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/seccultura.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/alinvest.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/alinvest.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/iica copia.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/iica copia.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/logo-gusi copia.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/logo-gusi copia.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/valles2 copia.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/valles2 copia.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/uqam2 copia.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/uqam2 copia.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/eaton copia.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/eaton copia.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/blanco/cedrssa2.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/blanco/cedrssa2.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div> 
                        <div class="col-lg-4 col-sm-6" style=" margin: auto auto;">
                            <a class="portfolio-box" href="{{url('images/logos clientes/uaslp.png')}}" style="border:0px;">
                                <img class="img-fluid" src="{{asset('images/logos clientes/uaslp.png')}}" style="width:100%; max-height:258px; padding: 10%;" alt="">
                            </a>
                        </div> 

                    </div>
                </div>

            </div>
        </section>                         


        <!-- Four -->
        <section id="four" class="wrapper style1 fade-up" style="border-left:1px dotted #8eb255;">
            <div class="inner">
                <h2 style="color:#30303e;">Contáctanos</h2>
                <p>Para nosotros es importante ofrecer medios de contacto para atender tus solicitudes. Si quieres atención personalizada favor de comunicarse al teléfono (444) 8356583 o bien nos puedes escribir un corre a <a href="mailto:contacto@cieet.com">contacto@cieet.com</a><br>
                    Será un placer atenderte.</p>
                <div class="split style1">
                    <section>
                        <form method="post" action="#">
                            <div class="field half first">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" required/>
                            </div>
                            <div class="field half">
                                <label for="email">Correo</label>
                                <input type="text" name="email" id="email" required/>
                            </div>
                            <div class="field">
                                <label for="message">Mensaje</label>
                                <textarea name="message" id="message" rows="5" style="resize: none;" required></textarea>
                            </div>
                            <ul class="actions">
                                <li><a class="button" onclick="enviaMensaje()">Enviar mensaje</a></li>
                            </ul>
                        </form>
                    </section>
                    <section>
                        <ul class="contact">
                            <!-- <li>
                                    <h3 style="color:#30303e;">Dirección</h3>
                                    <span>Monte Everest #120<br />
                                    San Luis Potosí, San Luis Potosí, 78434<br />
                                    México</span>
                            </li> -->
                            <li>
                                <h3 style="color:#30303e;">Correo</h3>
                                <a href="mailto:info@cieet.com">info@cieet.com</a>
                            </li>
                            <li>
                                <h3 style="color:#30303e;">Teléfono</h3>
                                <span>(444) 8356583</span>
                            </li>
                            <li>
                                <h3 style="color:#30303e;">Social</h3>
                                <ul class="icons">
                                    <li><a href="#" class="fa-twitter" style="color: #89ab53;"><span class="label">Twitter</span></a></li>
                                    <li><a href="#" class="fa-facebook"  style="color: #89ab53;"><span class="label">Facebook</span></a></li>
                                    <li><a href="#" class="fa-github"  style="color: #89ab53;"><span class="label">GitHub</span></a></li>
                                    <li><a href="#" class="fa-instagram"  style="color: #89ab53;"><span class="label">Instagram</span></a></li>
                                    <li><a href="#" class="fa-linkedin"  style="color: #89ab53;"><span class="label">LinkedIn</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection