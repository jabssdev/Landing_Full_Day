<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Noticia;
use App\Models\Sponsor;
use App\Models\Contador;
use App\Models\Participante;
use App\Models\Curso;
use Carbon\Carbon;
use App\Http\Controllers\web\flash;

class WebController extends Controller
{

    public function index() {
        $slider = Slider::orderby('created_at', 'desc')->first();
        $banner = Banner::first();
        $noticiareciente = Noticia::orderby('created_at', 'desc')->first();
        $noticias = Noticia::orderby('created_at', 'desc')->limit(3)->get();
        $sponsors = Sponsor::orderby('created_at', 'desc')->get();
        // contador
        $contador = Contador::where('estado', 'HABILITADO')->first();
        if(isset($contador)){
            $evento = Curso::where('nombre',$contador->nombre)->first();
            $fecha = $contador->fecha;
        }
        $fechaactual = Carbon::now();
        
        if(isset($contador)){
            $auxiliar = Carbon::parse($fecha);
            $ano=$auxiliar->format('Y');
            $dia=$auxiliar->format('d');
            $mes=$auxiliar->monthName;
            $hora=$contador->hora;
            $validar='existe';
        }
        else{
            $evento = 'No';
            $ano=$fechaactual->format('Y');
            $dia=$fechaactual->format('d');
            $mes=$fechaactual->monthName;
            $hora='00:00';
            $validar='no existe';

        }
        return view('web.index')->with(compact('evento','validar','hora','mes','dia','ano','sponsors','noticias','slider','banner','noticiareciente'));
    }

    public function participante($id) {
        $participante = participante::findOrFail($id);
        $participante->load('curso');
        return view('web.participante')->with(compact('participante'));
    }

    public function participanteStore(Request $request){
        try{ 
            $participante = new Participante();
            $participante->id_curso=$request->id_curso;
            $participante->nombre=$request->nombre;
            $participante->apellido=$request->apellido;
            $participante->correo=$request->correo;
            $participante->celular=$request->celular;
            $participante->estado='pendiente';
            $participante->save();
            $n_participante=Participante::find($participante->id);
            $n_participante->ruta='http://127.0.0.1:8000/participante/'.$participante->id;
            $n_participante->save();
            flash('Participante Registrado '.'<i class="fa fa-check"></i>'.'<br/>'.'En breve cantactaremos con usted...')->success()->important();
            return redirect()->route('web.index');
        }
        catch(\Exception $e){
            flash('Participante no registrado '.'<i class="fa fa-times"></i>'.'<br/>'.'Inténtelo de nuevo...')->error()->important();
            return redirect()->back();
        }
    }
    
}
