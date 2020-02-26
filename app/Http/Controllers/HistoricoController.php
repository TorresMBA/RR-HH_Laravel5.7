<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $historico_clima = DB::table('climalaboral_manager as t1')
        ->select(DB::raw('t1.id, t2.descripcion as nombre, t2.siglas, t1.name_clima_laboral as descripcion, 
        t1.created_at as fecha_creacion,
        t1.id_respuestas_creadas as encuestas_respondidas,
        case 
            when t1.enabled = "true"
            then "Activo"
            else "Inactivo" end as estado'))->join('empresas as t2', 't2.id', '=', 't1.id_empresa')
            ->where('t1.id_company', '=', auth()->user()->id_company)
            ->get();

        return view('climalaboral.index', [
            'historico' => $historico_clima
        ]);
    }

    public function edit(Request $request){
        $elimFamiliar = DB::table('climalaboral_manager')
        ->where('id', $request->id)
        ->update([
            'name_clima_laboral' => $request->descripcion,
            'enabled' => $request->estado
        ]);
        return back();
    }
}
