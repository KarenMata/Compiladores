@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
<script src="{{ asset('js/bancos.js')}}"></script> 
<div class="card">
    <div class="card-body">
        <div class="tab-container">
            <ul class="nav nav-tabs" role="tablist">
                @if(Session::get('banco')=='Scotiabank')
                    <li class="nav-item">
                        <a id="tab_scot" class="nav-link active" data-toggle="tab" href="#scotiabank" role="tab" aria-expanded="true">Scotiabank</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" data-toggle="tab" href="#banorte" role="tab" aria-expanded="false">Banorte</a> -->
                        <a id="tab_banorte" class="nav-link" data-toggle="collapse" href="#collapseBanorte" aria-expanded="false" aria-controls="collapseExample">Banorte</a> 
                        <div class="collapse" id="collapseBanorte" style="">
                            <div class="card card-body padding0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php $z=1; ?>
                                    @foreach($banorteCuentas as $bCuentas)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#{{$bCuentas->cuenta}}" role="tab" aria-expanded="false" onclick="active_banorte();">{{$bCuentas->cuenta}}</a>
                                    </li>
                                     @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @elseif(Session::get('banco')=='Banorte')
                    <li class="nav-item">
                        <a id="tab_scot" class="nav-link" data-toggle="tab" href="#scotiabank" role="tab" aria-expanded="true">Scotiabank</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link active" data-toggle="tab" href="#banorte" role="tab" aria-expanded="false">Banorte</a> -->
                        <a id="tab_banorte" class="nav-link collapsed active" data-toggle="collapse" href="#collapseBanorte" aria-expanded="false" aria-controls="collapseExample">Banorte</a>
                        <div class="collapse" id="collapseBanorte" style="">
                            <div class="card card-body padding0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php $z=1; ?>
                                    @foreach($banorteCuentas as $bCuentas)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#{{$bCuentas->cuenta}}" role="tab" aria-expanded="false" onclick="active_banorte();">{{$bCuentas->cuenta}}</a>
                                    </li>
                                     @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a id="tab_scot" class="nav-link active" data-toggle="tab" href="#scotiabank" role="tab" aria-expanded="true">Scotiabank</a>
                    </li>
                    <li class="nav-item" id="banorteTab">
                        <!-- <a class="nav-link" data-toggle="tab" href="#banorte" role="tab" aria-expanded="false">Banorte</a> -->
                        <a id="tab_banorte" class="nav-link" data-toggle="collapse" href="#collapseBanorte" aria-expanded="false" aria-controls="collapseExample">
                                    Banorte
                        </a> 
                        <div class="collapse" id="collapseBanorte" style="">
                            <div class="card card-body padding0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php $z=1; ?>
                                    @foreach($banorteCuentas as $bCuentas)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#{{$bCuentas->cuenta}}" role="tab" aria-expanded="false" onclick="active_banorte();">{{$bCuentas->cuenta}}</a>
                                    </li>
                                    <?php $z=$z+1; ?>
                                     @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endif
            </ul>
                           

            
                        
            <div class="tab-content">
                <?php $z=1; ?>
                @if(Session::get('banco')=='Scotiabank')
                    <div class="tab-pane fade active show" id="scotiabank" role="tabpanel" aria-expanded="true">
                        @include('bancos.table_scot')
                    </div>
                    @foreach($banorteCuentas as $bCuentas)
                        <div class="tab-pane fade" id="{{$bCuentas->cuenta}}" role="tabpanel" aria-expanded="false">
                            @include('bancos.table_banorte')
                        </div>
                        <?php $z=$z+1; ?>
                    @endforeach           
                @elseif(Session::get('banco')=='Banorte')
                    <div class="tab-pane fade" id="scotiabank" role="tabpanel" aria-expanded="true">
                        @include('bancos.table_scot')
                    </div>
                    @foreach($banorteCuentas as $bCuentas)
                        @if(Session::get('cuenta')==$bCuentas->cuenta)
                            <div class="tab-pane fade active show" id="{{$bCuentas->cuenta}}" role="tabpanel" aria-expanded="false">
                                @include('bancos.table_banorte')
                            </div>
                        @else
                            <div class="tab-pane fade" id="{{$bCuentas->cuenta}}" role="tabpanel" aria-expanded="false">
                                @include('bancos.table_banorte')
                            </div>
                        @endif
                        <?php $z=$z+1; ?>
                    @endforeach  
                @else
                    <div class="tab-pane fade active show" id="scotiabank" role="tabpanel" aria-expanded="true">
                        @include('bancos.table_scot')
                    </div>
                    @foreach($banorteCuentas as $bCuentas)
                        <div class="tab-pane fade" id="{{$bCuentas->cuenta}}" role="tabpanel" aria-expanded="false">
                            @include('bancos.table_banorte')
                        </div>
                        <?php $z=$z+1; ?>
                    @endforeach  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
           