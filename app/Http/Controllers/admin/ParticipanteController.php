<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Participante;
use App\Models\Curso;
use App\Models\Curso_Participante;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class participanteController extends Controller
{
    public function pendientes() {
        $pendientes=participante::orderby('created_at', 'desc')->where('estado','pendiente')->get();
        $pendientes->load('curso');
        return view('admin.pages.participante.pendientes')->with(['pendientes'=> $pendientes]); //variable que lleva a la vista
    }

    public function finalizados() {
        $finalizados=participante::orderby('created_at', 'desc')->where('estado','aceptado')->get();
        $finalizados->load('curso');
        return view('admin.pages.participante.finalizados')->with(['finalizados'=> $finalizados]); //variable que lleva a la vista
    }

    public function rechazados() {
        $rechazados=participante::orderby('created_at', 'desc')->where('estado','rechazado')->get();
        $rechazados->load('curso');
        return view('admin.pages.participante.rechazados')->with(['rechazados'=> $rechazados]); //variable que lleva a la vista
    }

    public function create(){
        $cursos=Curso::all();
        return view('admin.pages.participante.create')->with(['cursos'=> $cursos]);
    }

    public function store(Request $request){
        
        try{
            $participante = new participante();
            $participante->id_curso=$request->id_curso;
            $participante->nombre=$request->nombre;
            $participante->apellido=$request->apellido;
            $participante->correo=$request->correo;
            $participante->celular=$request->celular;
            $participante->dni=$request->dni;
            $participante->direccion=$request->direccion;
            $participante->lugar=$request->lugar;
            $participante->especialidad=$request->especialidad;
            if ($request->file('imagen')) {
                $file=$request->file('imagen');
                $name='participante_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/participante_img/'; //public_path = http:
                $file->move($path,$name);
                $participante->imagen=$name;
            } 
            $participante->pagos=$request->pagos;
            $participante->estado='aceptado';
            $participante->save();
            $n_participante=Participante::find($participante->id);
            $n_participante->ruta='http://127.0.0.1:8000/participante/'.$participante->id;
            $n_participante->save();
            $usuario=new User();
            $usuario->name=$participante->nombre;
            $usuario->email=$participante->correo;
            $usuario->password=bcrypt($participante->dni);
            $usuario->rol='participante';
            $usuario->id_user=$participante->id;
            $usuario->save();
            return redirect()->route('participante.finalizados');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function edit($id){
        $participante=Participante::find($id);
        $cursos=Curso::all();
        return view('admin.pages.participante.edit')->with(['cursos'=> $cursos,'participante'=> $participante]);
    }

    public function update(Request $request, $id){
        try{
            $participante=Participante::find($id);
            $participante->id_curso=$request->id_curso;
            $participante->nombre=$request->nombre;
            $participante->apellido=$request->apellido;
            $participante->correo=$request->correo;
            $participante->celular=$request->celular;
            $participante->dni=$request->dni;
            $participante->direccion=$request->direccion;
            $participante->lugar=$request->lugar;
            $participante->especialidad=$request->especialidad;
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $name='participante_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/participante_img/';

                $file->move($path, $name);
                if ($participante->imagen){
                    if(file_exists( $path.$participante->imagen)){
                        unlink($path.$participante->imagen);
                    }
                }
                $participante->imagen = $name;
            }
            $participante->pagos=$request->pagos;
            $participante->estado='aceptado';
            $participante->ruta='http://127.0.0.1:8000/participante/'.$participante->id;
            $participante->save();
            $user=User::where('id_user',$participante->id)->first();
            $user->name=$participante->nombre;
            $user->email=$participante->correo;
            $user->password=bcrypt($participante->dni);
            $user->id_user=$participante->id;
            $user->save();
            return redirect()->route('participante.finalizados');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function editPendientes($id){
        $participante=Participante::find($id);
        $cursos=Curso::all();
        return view('admin.pages.participante.editpendiente')->with(['cursos'=> $cursos,'participante'=> $participante]);
    }

    public function updatePendientes(Request $request, $id){
        try{
            $participante=Participante::find($id);
            $participante->id_curso=$request->id_curso;
            $participante->nombre=$request->nombre;
            $participante->apellido=$request->apellido;
            $participante->correo=$request->correo;
            $participante->celular=$request->celular;
            $participante->dni=$request->dni;
            $participante->direccion=$request->direccion;
            $participante->lugar=$request->lugar;
            $participante->especialidad=$request->especialidad;
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $name='participante_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/participante_img/';
                $file->move($path, $name);
                if ($participante->imagen){
                    if(file_exists( $path.$participante->imagen)){
                        unlink($path.$participante->imagen);
                    }
                }
                $participante->imagen = $name;
            }
            $participante->pagos=$request->pagos;
            $participante->estado='pendiente';
            $participante->ruta='http://127.0.0.1:8000/participante/'.$participante->id;
            $participante->save();
            return redirect()->route('participante.pendientes');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function editRechazados($id){
        $participante=Participante::find($id);
        $cursos=Curso::all();
        return view('admin.pages.participante.editrechazado')->with(['cursos'=> $cursos,'participante'=> $participante]);
    }

    public function updateRechazados(Request $request, $id){
        try{
            $participante=Participante::find($id);
            $participante->id_curso=$request->id_curso;
            $participante->nombre=$request->nombre;
            $participante->apellido=$request->apellido;
            $participante->correo=$request->correo;
            $participante->celular=$request->celular;
            $participante->dni=$request->dni;
            $participante->direccion=$request->direccion;
            $participante->lugar=$request->lugar;
            $participante->especialidad=$request->especialidad;
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $name='participante_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/participante_img/';

                $file->move($path, $name);
                if ($participante->imagen){
                    if(file_exists( $path.$participante->imagen)){
                        unlink($path.$participante->imagen);
                    }
                }
                $participante->imagen = $name;
            }
            $participante->pagos=$request->pagos;
            $participante->estado='rechazado';
            $participante->ruta='http://127.0.0.1:8000/participante/'.$participante->id;
            $participante->save();
            return redirect()->route('participante.rechazados');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function confirmarParticipante($id){
        $participante=participante::findOrFail($id);
        $participante->estado='aceptado';
        $participante->save();
        $usuario=new User();
        $usuario->name=$participante->nombre;
        $usuario->email=$participante->correo;
        $usuario->password=bcrypt($participante->dni);
        $usuario->rol='participante';
        $usuario->id_user=$participante->id;
        $usuario->save();
        return redirect()->route('participante.pendientes');
    }

    public function rechazarParticipante($id){
        $participante=participante::findOrFail($id);
        $participante->estado='rechazado';
        $participante->save();
        return redirect()->route('participante.pendientes');
    }

    public function rechazarParticipanteAceptado($id){
        $participante=participante::findOrFail($id);
        $participante->estado='rechazado';
        $participante->save();
        return redirect()->route('participante.finalizados');
    }

    public function delete($id){
        try {
            $participante = participante::find($id);
            $participante->delete();
            $user=User::where('id_user',$participante->id)->first();
            $user->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }

    public function deletependiente($id){
        try {
            $participante = participante::find($id);
            $participante->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
    public function deleterechazado($id){
        try {
            $participante = participante::find($id);
            $participante->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }

    public function historial(){
        $historial=Participante::orderby('created_at', 'desc')->get();
        return view('admin.pages.participante.historial')->with(['historial'=> $historial]);
    }

    public function historialParticipante($id_participante) {
      $datos=Curso_Participante::where('id_participante', $id_participante)->get();
      return view('admin.pages.participante.cursos')->with(['datos'=> $datos]);
    }

    public function datosParticipante($id) {
      $participante=Participante::find($id);
      return view('admin.pages.participante.datos')->with(['participante'=> $participante]);
    }

    public function consultaReniec($dni){
        $consulta =file_get_contents('https://api.apis.net.pe/v1/dni?numero='. $dni);
        return $consulta;
    }

    public function createCursosParticipante($id_participante){
        $cursos=Curso::all();
        return view('admin.pages.participante.createCursosParticipante')->with(['cursos'=> $cursos,'id_participante'=> $id_participante]);
    }

    public function storeCursosParticipante(Request $request){
        
        try{
            $participante = new Curso_Participante();
            $participante->id_curso=$request->id_curso;
            $participante->id_participante=$request->id_participante;
            // dd($participante);
            $participante->save();
            return redirect()->route('participante.cursos');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function certificados() {
        return view('admin.pages.participante.part-cert'); //variable que lleva a la vista
    }

    public function lista_cursos(){
        return view('admin.pages.participante.lista_cursos');
    }
}
