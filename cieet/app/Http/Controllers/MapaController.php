<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidades;
use App\Models\Municipios;
use App\Models\Padron;
use Illuminate\Support\Facades\Session;
use Config;
use Schema;

class MapaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapa_() {
        $municipios = Comunidades::groupby('id_municipio')->pluck('id_municipio');
        $colonias = Comunidades::where('id_municipio', 31)->select('nombre')->groupBy('nombre')->pluck('nombre');
        $padron = Padron::whereIn('colonia', $colonias)->where('id_municipio', 31)->get();
        return view('mapa.mapa')->with('municipios', $municipios)->with('padron', $padron);
    }

    public function mapa(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron2 = $this->search($filtro, 2)->paginate($filtro["tamPag"]);
        $padron3 = $this->search($filtro, 3)->paginate($filtro["tamPag"]);
        $padron10 = $this->search($filtro, 10)->paginate($filtro["tamPag"]);
        $padron12 = $this->search($filtro, 12)->paginate($filtro["tamPag"]);
        $padron13 = $this->search($filtro, 13)->paginate($filtro["tamPag"]);
        $padron14 = $this->search($filtro, 14)->paginate($filtro["tamPag"]);
        $padron16 = $this->search($filtro, 16)->paginate($filtro["tamPag"]);
        $padron18 = $this->search($filtro, 18)->paginate($filtro["tamPag"]);
        $padron23 = $this->search($filtro, 23)->paginate($filtro["tamPag"]);
        $padron26 = $this->search($filtro, 26)->paginate($filtro["tamPag"]);
        $padron28 = $this->search($filtro, 28)->paginate($filtro["tamPag"]);
        $padron29 = $this->search($filtro, 29)->paginate($filtro["tamPag"]);
        $padron31 = $this->search($filtro, 31)->paginate($filtro["tamPag"]);
        $padron34 = $this->search($filtro, 34)->paginate($filtro["tamPag"]);
        $padron36 = $this->search($filtro, 36)->paginate($filtro["tamPag"]);
        $padron37 = $this->search($filtro, 37)->paginate($filtro["tamPag"]);
        $padron38 = $this->search($filtro, 38)->paginate($filtro["tamPag"]);
        $padron39 = $this->search($filtro, 39)->paginate($filtro["tamPag"]);
        $padron40 = $this->search($filtro, 40)->paginate($filtro["tamPag"]);
        $padron41 = $this->search($filtro, 41)->paginate($filtro["tamPag"]);
        $padron42 = $this->search($filtro, 42)->paginate($filtro["tamPag"]);
        $padron53 = $this->search($filtro, 53)->paginate($filtro["tamPag"]);
        $padron54 = $this->search($filtro, 54)->paginate($filtro["tamPag"]);
        $padron57 = $this->search($filtro, 57)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table31')->with('padron31', $padron31);
        } else {
            return view('mapa.mapa')->with('padron2', $padron2)->with('padron3', $padron3)->with('padron10', $padron10)
                    ->with('padron12', $padron12)->with('padron13', $padron13)->with('padron14', $padron14)->with('padron16', $padron16)
                    ->with('padron18', $padron18)->with('padron23', $padron23)->with('padron26', $padron26)->with('padron28', $padron28)
                    ->with('padron29', $padron29)->with('padron31', $padron31)->with('padron34', $padron34)->with('padron36', $padron36)
                    ->with('padron37', $padron37)->with('padron38', $padron38)->with('padron39', $padron39)->with('padron40', $padron40)
                    ->with('padron41', $padron41)->with('padron42', $padron42)->with('padron53', $padron53)->with('padron54', $padron54)
                    ->with('padron57', $padron57);
        }
    }

    public function mapa2(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron2 = $this->search($filtro, 2)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table2')->with('padron2', $padron2);
        } else {
            return view('mapa.mapa')->with('padron2', $padron2);
        }
    }
    public function mapa3(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron3 = $this->search($filtro, 3)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table3')->with('padron3', $padron3);
        } else {
            return view('mapa.mapa')->with('padron3', $padron3);
        }
    }
    public function mapa10(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron10 = $this->search($filtro, 10)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table10')->with('padron10', $padron10);
        } else {
            return view('mapa.mapa')->with('padron10', $padron10);
        }
    }
    public function mapa12(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron12 = $this->search($filtro, 12)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table12')->with('padron12', $padron12);
        } else {
            return view('mapa.mapa')->with('padron12', $padron12);
        }
    }
    public function mapa13(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron13 = $this->search($filtro, 13)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table13')->with('padron13', $padron13);
        } else {
            return view('mapa.mapa')->with('padron13', $padron13);
        }
    }
    public function mapa14(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron14 = $this->search($filtro, 14)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table14')->with('padron14', $padron14);
        } else {
            return view('mapa.mapa')->with('padron14', $padron14);
        }
    }
    public function mapa16(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron16 = $this->search($filtro, 16)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table16')->with('padron16', $padron16);
        } else {
            return view('mapa.mapa')->with('padron16', $padron16);
        }
    }
    public function mapa18(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron18 = $this->search($filtro, 18)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table18')->with('padron18', $padron18);
        } else {
            return view('mapa.mapa')->with('padron18', $padron18);
        }
    }
    public function mapa23(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron23 = $this->search($filtro, 23)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table23')->with('padron23', $padron23);
        } else {
            return view('mapa.mapa')->with('padron23', $padron23);
        }
    }
    public function mapa26(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron26 = $this->search($filtro, 26)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table26')->with('padron26', $padron26);
        } else {
            return view('mapa.mapa')->with('padron26', $padron26);
        }
    }
    public function mapa28(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron28 = $this->search($filtro, 28)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table28')->with('padron28', $padron28);
        } else {
            return view('mapa.mapa')->with('padron28', $padron28);
        }
    }
    public function mapa29(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron29 = $this->search($filtro, 29)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table29')->with('padron29', $padron29);
        } else {
            return view('mapa.mapa')->with('padron29', $padron29);
        }
    }
    public function mapa31(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron31 = $this->search($filtro, 31)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table31')->with('padron31', $padron31);
        } else {
            return view('mapa.mapa')->with('padron31', $padron31);
        }
    }
    public function mapa34(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron34 = $this->search($filtro, 34)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table34')->with('padron34', $padron34);
        } else {
            return view('mapa.mapa')->with('padron34', $padron34);
        }
    }
    public function mapa36(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron36 = $this->search($filtro, 36)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table36')->with('padron36', $padron36);
        } else {
            return view('mapa.mapa')->with('padron36', $padron36);
        }
    }
    public function mapa37(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron37 = $this->search($filtro, 37)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table37')->with('padron37', $padron37);
        } else {
            return view('mapa.mapa')->with('padron37', $padron37);
        }
    }
    public function mapa38(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron38 = $this->search($filtro, 38)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table38')->with('padron38', $padron38);
        } else {
            return view('mapa.mapa')->with('padron38', $padron38);
        }
    }
    public function mapa39(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron39 = $this->search($filtro, 39)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table39')->with('padron39', $padron39);
        } else {
            return view('mapa.mapa')->with('padron39', $padron39);
        }
    }
    public function mapa40(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron40 = $this->search($filtro, 40)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table40')->with('padron40', $padron40);
        } else {
            return view('mapa.mapa')->with('padron40', $padron40);
        }
    }
    public function mapa41(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron41 = $this->search($filtro, 41)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table41')->with('padron41', $padron41);
        } else {
            return view('mapa.mapa')->with('padron41', $padron41);
        }
    }
    public function mapa42(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron42 = $this->search($filtro, 42)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table42')->with('padron42', $padron42);
        } else {
            return view('mapa.mapa')->with('padron42', $padron42);
        }
    }
    public function mapa53(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron53 = $this->search($filtro, 53)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table53')->with('padron53', $padron53);
        } else {
            return view('mapa.mapa')->with('padron53', $padron53);
        }
    }
    public function mapa54(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron54 = $this->search($filtro, 54)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table54')->with('padron54', $padron54);
        } else {
            return view('mapa.mapa')->with('padron54', $padron54);
        }
    }
    public function mapa57(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $padron57 = $this->search($filtro, 57)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('mapa.table57')->with('padron57', $padron57);
        } else {
            return view('mapa.mapa')->with('padron57', $padron57);
        }
    }

    public function search($filtro, $m) {
        $cols = '';
        $colonias = Comunidades::where('id_municipio', $m)->select('nombre')->groupBy('nombre')->pluck('nombre');
        foreach ($colonias as $c) {
            $cols .= "'$c',";
        }
        $cols = trim($cols, ',');
        $texto = $filtro["filtro"];
        $order = $filtro["order"];
        $ot = $filtro["ot"];

        $query = Padron::query()->whereRaw("colonia in ($cols) ")->whereRaw("id_municipio = $m ");

        $texto = str_replace(' ', '', $texto);
        $columns = Schema::getColumnListing('padron');
        $wh = "";
        if ($texto) {
            $query->whereRaw(" (REPLACE(CAST(CONCAT(nombre,' ',ap_paterno,' ',ap_materno) as CHAR),' ','') LIKE '%". $texto ."%' "
                    . " OR REPLACE(CAST(colonia as CHAR),' ','') LIKE '%". $texto ."%')");
        }

        if ($order) {
            if ($ot == 0)
                $query->orderBy($order, 'asc');
            else
                $query->orderBy($order, 'desc');
        }

        $query->selectRaw("nombre,ap_paterno,ap_materno,colonia");
//        $query->selectRaw("nombre,ap_paterno,ap_materno,colonia")->orderBy(\DB::raw('DATE_FORMAT(personalPadron.fecha_alta,"%Y-%m-%d")'), 'desc');
        return $query;
    }

}
