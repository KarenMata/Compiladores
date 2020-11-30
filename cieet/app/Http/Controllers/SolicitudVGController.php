<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SolicitudVG;
use App\Models\SolicitudComitiva;
use App\Models\SolicitudRelComEfe;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use File;
use Redirect;
use Illuminate\Support\Facades\Session;
use PDFMerger;
use Storage;

class SolicitudVGController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     public function index() {
        $solVG = SolicitudVG::select('id','solicitante','fechaSol','fechaSal','proyecto')->get();
        return view('solicitudVG/index')->with('solVG',$solVG);
     }

     public function create()
    {
        return view('solicitudVG/create');
    }
    
     public function store(Request $request)
    {
//        dd($request->all());
        $input = $request->all();
        $data["solicitante"] = $input["solicitante"];
        $data["fechaSol"] = $input["fechaSol"];
        $data["fechaSal"] = $input["fechaSal"];
        $data["proyecto"] = $input["proyecto"];
        $data["actividades"] = $input["actividades"];
        $data["objetivo"] = $input["objetivo"];
        $data["destino"] = $input["destino"];
        
        isset($input["gasolina"]) ? $data["gasolina"] = 1 : $data["gasolina"] = null;
        isset($input["alimentos"]) ? $data["alimentos"] = 1 : $data["alimentos"] = null;
        isset($input["hospedaje"]) ? $data["hospedaje"] = 1 : $data["hospedaje"] = null;
        isset($input["otroSol"]) ? $data["otroSol"] = 1 : $data["otroSol"] = null;
        isset($input["tarjEden"]) ? $data["tarjEden"] = 1 : $data["tarjEden"] = null;
        isset($input["tarjDeb"]) ? $data["tarjDeb"] = 1 : $data["tarjDeb"] = null;
        isset($input["efectivoER"]) ? $data["efectivoER"] = 1 : $data["efectivoER"] = null;
        isset($input["otroEnt"]) ? $data["otroEnt"] = 1 : $data["otroEnt"] = null;

        $data["vehiculo"] = $input["vehiculo"];
        $data["destinoME"] = $input["destinoME"];
        $data["kmIni"] = $input["kmIni"];
        $data["kmFin"] = $input["kmFin"];
        
        isset($input["recibe"]) ? $data["recibe"] = 1 : $data["recibe"] = null;
        isset($input["entrega"]) ? $data["entrega"] = 1 : $data["entrega"] = null;
        
        $data["hrApSal"] = $input["hrApSal"];
        $data["hrApLle"] = $input["hrApLle"];
        $data["hrReSal"] = $input["hrReSal"];
        $data["hrReLle"] = $input["hrReLle"];
        $data["fechaLle"] = $input["fechaLle"];
        $data["edenred"] = $input["edenred"];
        $data["debito"] = $input["debito"];
        $data["miEden"] = $input["miEden"];
        $data["mfEden"] = $input["mfEden"];
        $data["miDeb"] = $input["miDeb"];
        $data["mfDeb"] = $input["mfDeb"];
        $data["efectivo"] = $input["efectivo"];
        $data["otroMed"] = $input["otroMed"];
        $data["responsable"] = $input["responsable"];
        $data["observaciones"] = $input["observaciones"];
        
        $sol = SolicitudVG::creaRegistro($data);
        $i=0;
        foreach($input["nomb"] as $nom){
            $dataC[$i]["id_solicitud"] = $sol->id;
            $dataC[$i]["nombre"] = $nom;
            $dataC[$i]["actividad"] = $input["act"][$i];
            $dataC[$i]["as_si"] = $input["as_si"][$i];
            $dataC[$i]["as_no"] = $input["as_no"][$i];
            $dataC[$i]["objetivo"] = $input["obj"][$i];
            $dataC[$i]["observaciones"] = $input["obs"][$i];
            SolicitudComitiva::creaRegistro($dataC[$i]);
            $i++;
        }
        $i=0;
        foreach($input["concepto"] as $con){
            $dataR[$i]["id_solicitud"] = $sol->id;
            $dataR[$i]["concepto"] = $con;
            $dataR[$i]["monto"] = $input["monto"][$i];
            $dataR[$i]["rec_fac_na"] = $input["rfna"][$i];
            SolicitudRelComEfe::creaRegistro($dataR[$i]);
            $i++;
        }
        if($sol){            
            Session::flash('tituloMsg','Guardado exitoso!');
            Session::flash('mensaje',"Se ha guardado existosamente la solicitud.");
            Session::flash('tipoMsg','success');
        }
        else{
            Session::flash('tituloMsg','Guardado fallido!');
            Session::flash('mensaje',"No se ha podido guardar la solicitud.");
            Session::flash('tipoMsg','error');
        }
        return Redirect::to('solicitudVG/index');
    }
    
    public function edit($id)
    {
        $solVG = SolicitudVG::find($id);
        $solCom = SolicitudComitiva::where('id_solicitud',$id)->get();
        $solRCE = SolicitudRelComEfe::where('id_solicitud',$id)->get();        
        return view('solicitudVG/edit')->with(['solVG'=>$solVG,'solCom'=>$solCom,'solRCE'=>$solRCE]);
    }
    
    public function update(Request $request)
    {        
        $input = $request->all();
        $data['id'] = $input['id'];  
        $data["solicitante"] = $input["solicitante"];
        $data["fechaSol"] = $input["fechaSol"];
        $data["fechaSal"] = $input["fechaSal"];
        $data["proyecto"] = $input["proyecto"];
        $data["actividades"] = $input["actividades"];
        $data["objetivo"] = $input["objetivo"];
        $data["destino"] = $input["destino"];
        
        isset($input["gasolina"]) ? $data["gasolina"] = 1 : $data["gasolina"] = null;
        isset($input["alimentos"]) ? $data["alimentos"] = 1 : $data["alimentos"] = null;
        isset($input["hospedaje"]) ? $data["hospedaje"] = 1 : $data["hospedaje"] = null;
        isset($input["otroSol"]) ? $data["otroSol"] = 1 : $data["otroSol"] = null;
        isset($input["tarjEden"]) ? $data["tarjEden"] = 1 : $data["tarjEden"] = null;
        isset($input["tarjDeb"]) ? $data["tarjDeb"] = 1 : $data["tarjDeb"] = null;
        isset($input["efectivoER"]) ? $data["efectivoER"] = 1 : $data["efectivoER"] = null;
        isset($input["otroEnt"]) ? $data["otroEnt"] = 1 : $data["otroEnt"] = null;

        $data["vehiculo"] = $input["vehiculo"];
        $data["destinoME"] = $input["destinoME"];
        $data["kmIni"] = $input["kmIni"];
        $data["kmFin"] = $input["kmFin"];
        
        isset($input["recibe"]) ? $data["recibe"] = 1 : $data["recibe"] = null;
        isset($input["entrega"]) ? $data["entrega"] = 1 : $data["entrega"] = null;
        
        $data["hrApSal"] = $input["hrApSal"];
        $data["hrApLle"] = $input["hrApLle"];
        $data["hrReSal"] = $input["hrReSal"];
        $data["hrReLle"] = $input["hrReLle"];
        $data["fechaLle"] = $input["fechaLle"];
        $data["edenred"] = $input["edenred"];
        $data["debito"] = $input["debito"];
        $data["miEden"] = $input["miEden"];
        $data["mfEden"] = $input["mfEden"];
        $data["miDeb"] = $input["miDeb"];
        $data["mfDeb"] = $input["mfDeb"];
        $data["efectivo"] = $input["efectivo"];
        $data["otroMed"] = $input["otroMed"];
        $data["responsable"] = $input["responsable"];
        $data["observaciones"] = $input["observaciones"];
        
        $sol = SolicitudVG::editaRegistro($data);
        
        if($sol){            
            Session::flash('tituloMsg','Guardado exitoso!');
            Session::flash('mensaje',"Se ha editado existosamente la solicitud.");
            Session::flash('tipoMsg','success');
        }
        else{
            Session::flash('tituloMsg','Guardado fallido!');
            Session::flash('mensaje',"No se ha podido editar la solicitud.");
            Session::flash('tipoMsg','error');
        }
        
        $i=0;
        SolicitudComitiva::where('id_solicitud',$data["id"])->delete();
        foreach($input["nomb"] as $nom){
            $dataC[$i]["id_solicitud"] = $data["id"];
            $dataC[$i]["nombre"] = $nom;
            $dataC[$i]["actividad"] = $input["act"][$i];
            $dataC[$i]["as_si"] = $input["as_si"][$i];
            $dataC[$i]["as_no"] = $input["as_no"][$i];
            $dataC[$i]["objetivo"] = $input["obj"][$i];
            $dataC[$i]["observaciones"] = $input["obs"][$i];
            SolicitudComitiva::creaRegistro($dataC[$i]);
            $i++;
        }
        $i=0;
        SolicitudRelComEfe::where('id_solicitud',$input["id"])->delete();
        foreach($input["concepto"] as $con){
            $dataR[$i]["id_solicitud"] = $data["id"];
            $dataR[$i]["concepto"] = $con;
            $dataR[$i]["monto"] = $input["monto"][$i];
            $dataR[$i]["rec_fac_na"] = $input["rfna"][$i];
            SolicitudRelComEfe::creaRegistro($dataR[$i]);
            $i++;
        }
        
        return Redirect::to('solicitudVG/index');
    }
    
    public function delete($id){
        SolicitudComitiva::where('id_solicitud',$id)->delete();
        SolicitudRelComEfe::where('id_solicitud',$id)->delete();
        $sol = SolicitudVG::find($id)->delete();
        
        if($sol){            
            Session::flash('tituloMsg','Borrado exitoso!');
            Session::flash('mensaje',"Se ha eliminado existosamente la solicitud.");
            Session::flash('tipoMsg','success');
        }
        else{
            Session::flash('tituloMsg','Borrado fallido!');
            Session::flash('mensaje',"No se ha podido borrar la solicitud.");
            Session::flash('tipoMsg','error');
        }
        return Redirect::to('solicitudVG/index');
    }

}
