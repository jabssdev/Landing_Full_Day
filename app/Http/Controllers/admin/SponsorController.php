<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use PhpParser\Node\Stmt\TryCatch;

class SponsorController extends Controller
{
    public function index() {
        $sponsors=Sponsor::orderby('created_at', 'desc')->get();
        return view('admin.pages.sponsor.index')->with(['sponsors'=> $sponsors]); //variable que lleva a la vista
    }

    public function create(){
        return view('admin.pages.sponsor.create');
    }

    public function store(Request $request){
        
        try{
            $sponsor = new Sponsor() ;
            if ($request->file('imagen')) {
                $file=$request->file('imagen');
                $name='sponsor_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/sponsor_img/'; //public_path = http:
                $file->move($path,$name);
                $sponsor->imagen=$name;
            } 
            $sponsor->ruta=$request->ruta;
            $sponsor->save();
            return redirect()->route('sponsor.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function edit($id){
        $sponsor=Sponsor::find($id);
        return view('admin.pages.sponsor.edit')->with(['sponsor'=> $sponsor]);
    }

    public function update(Request $request, $id){
        try{
            $sponsor=Sponsor::find($id);
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $name='sponsor_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/sponsor_img/';

                $file->move($path, $name);
                if ($sponsor->imagen){
                    if(file_exists( $path.$sponsor->imagen)){
                        unlink($path.$sponsor->imagen);
                    }
                }
                $sponsor->imagen = $name;
            }
            $sponsor->ruta=$request->ruta;
            $sponsor->save();
            return redirect()->route('sponsor.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            $sponsor = Sponsor::find($id);
            $sponsor->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}

