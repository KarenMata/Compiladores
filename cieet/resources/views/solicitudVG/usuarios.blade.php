@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
 
<!--<div class='box box-header'>
        <a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
    </div>-->


            <!-- Content -->
            <section id="content" class="container">
            
                
                
                <!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Usuarios</li>
                </ol>
                
                <!--<a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>-->
                
                <h4 class="page-title">USUARIOS</h4>
                 
                
                <div class='box box-header block-area'>
                    <a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
                </div>
                
                <!-- Deafult Table -->
                <div class="block-area" id="defaultStyle">
                    <h3 class="block-title">Listado de usuarios en el Sistema</h3>
                    <table class="table tile table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Fotografía</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Vigencia<br>Contrato</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img width="40" src="../img/profile-pics/1.jpg" alt=""></td>
                                <td>Jhon </td>
                                <td>Makinton </td>
                                <td>makinton@cieet.org</td>
                                <td>444123456</td>
                                <td>01/01/2018</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img width="40" src="../img/profile-pics/1.jpg" alt=""></td>
                                <td>Malinda</td>
                                <td>Hollaway</td>
                                <td>hollway@cieet.org</td>
                                <td>444123456</td>
                                <td>01/01/2018</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img width="40" src="../img/profile-pics/1.jpg" alt=""></td>
                                <td>Wayn</td>
                                <td>Parnel</td>
                                <td>wayne123@cieet.org</td>
                                <td>444123456</td>
                                <td>01/01/2018</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img width="40" src="../img/profile-pics/1.jpg" alt=""></td>
                                <td>Wayn</td>
                                <td>Parnel</td>
                                <td>wayne123@cieet.org</td>
                                <td>444123456</td>
                                <td>01/01/2018</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><img width="40" src="../img/profile-pics/1.jpg" alt=""></td>
                                <td>Wayn</td>
                                <td>Parnel</td>
                                <td>wayne123@cieet.org</td>
                                <td>444123456</td>
                                <td>01/01/2018</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </section>
            
@endsection
           
