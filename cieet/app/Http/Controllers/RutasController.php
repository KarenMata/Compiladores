<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RutasController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static function parentRoute($rutas, $path) {

        $path = explode("/", $path)[0];

        return in_array($path, $rutas) ? 'navigation__sub--active navigation__sub--toggled' : '';
        
    }
    
    static function childRoute($route) {
        
        return Request::path() == $route ? 'navigation__active' : '';
        
    }

}
