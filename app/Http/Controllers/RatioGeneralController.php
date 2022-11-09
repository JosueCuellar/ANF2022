<?php

namespace App\Http\Controllers;
use App\Sector;
use App\Periodo;
use App\Ratio;
use App\RatioGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatioGeneralController extends Controller
{
    public function index()
    {
        $ratiosGen = DB::select(
            "SELECT a.id, b.year, c.nombre, d.parametro, a.valor FROM ratio_general a
            INNER JOIN periodo b ON b.id = a.periodo_id
            INNER JOIN sector c ON c.id = a.sector_id
            INNER JOIN ratio d ON d.id = a.ratio_id
            ");
        $sectors = DB::select("SELECT * FROM sector");
        $anios = DB::select("SELECT * FROM periodo");
        $ratios = DB::select("SELECT * FROM ratio");
        return view('simpleViews.ratioGeneral.index', compact('ratiosGen','sectors','anios','ratios'));
    }
    public function create()
    {

        $sectors = Sector::all();
        $anios = Periodo::all();
        $ratios = Ratio::all();
        return view('ratioGeneral.create', compact('sectors','anios','ratios'));
    }
    public function store(Request $request)
    {
        request()->validate([
            'ratio_id'=> 'required',
            'periodo_id'=> 'required',
            'sector_id'=> 'required',
            'valor'=> 'required',
        ],
        [
            'ratio_id.required' => "Seleccione un tipo de ratio.",
            'periodo_id.required' => "Seleccione un tipo de periodo.",
            'sector_id.required' => "Seleccione un tipo de sector.",
            'valor.required' => "El campo 'valor' es obligatorio.",
        ]);
        $respuesta= $this->guardar($request,TRUE);
        if($respuesta===TRUE){
            return redirect()->route('ratioGeneral.index')->with('status', 'Ratio por sector creado exitosamente');
        }
        else{
            return back()->withErrors(['msg'=>$respuesta]);
        }
    }

    public function show(RatioPorSector $ratioPorSector)
    {

        try{
            $sectors = Sector::all();
            $anios = PeriodoContable::all();
            $ratios = Ratio::all();
            return view('ratioPorSector.edit', compact('ratioPorSector','sectors','anios','ratios'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function update(RatioPorSectorRequest $request, RatioPorSector $ratioPorSector)
    {
        try{

            $ratioPorSector->ratio_id = $request->ratio_id;
            $ratioPorSector->periodo_contable_id = $request->periodo_contable_id;
            $ratioPorSector->sector_id = $request->sector_id;
            $ratioPorSector->valor = $request->valor;
            $ratioPorSector->save();
            return redirect()->route('ratioPorSector.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        if($ratio=RatioGeneral::Where('id',$id)->first()){

        $ratio->delete();
        return redirect()->route('ratioGeneral.index')->with('status', 'Ratio eliminada');
        }

    }
    public function guardar($request, $metodo){

        $sector = new RatioGeneral();
        $sector->ratio_id = $request->ratio_id;
        $sector->periodo_id = $request->periodo_id;
        $sector->sector_id = $request->sector_id;
        $sector->valor = $request->valor;
        $sector->save();
        return TRUE;
    }
}
