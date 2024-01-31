<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use PhpParser\Node\Stmt\TryCatch;

class BannerController extends Controller
{
    public function index() {
        $banners=Banner::orderby('created_at', 'desc')->get();
        return view('admin.pages.banner.index')->with(['banners'=> $banners]); //variable que lleva a la vista
    }

    public function create(){
        return view('admin.pages.banner.create');
    }

    public function store(Request $request){
        
        try{
            $banner = new Banner() ;
            if ($request->file('imagen')) {
                $file=$request->file('imagen');
                $name='banner_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/banner_img/'; //public_path = http:
                $file->move($path,$name);
                $banner->imagen=$name;
            } 
            $banner->subtitulo=$request->subtitulo;
            $banner->titulo=$request->titulo;
            $banner->descripcion=$request->descripcion;
            $banner->ruta=$request->ruta;
            $banner->save();
            return redirect()->route('banner.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function edit($id){
        $banner=Banner::find($id);
        return view('admin.pages.banner.edit')->with(['banner'=> $banner]);
    }

    public function update(Request $request, $id){
        try{
            $banner=Banner::find($id);
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $name='banner_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/banner_img/';

                $file->move($path, $name);
                if ($banner->imagen){
                    if(file_exists( $path.$banner->imagen)){
                        unlink($path.$banner->imagen);
                    }
                }
                $banner->imagen = $name;
            }
            $banner->subtitulo=$request->subtitulo;
            $banner->titulo=$request->titulo;
            $banner->descripcion=$request->descripcion;
            $banner->ruta=$request->ruta;
            $banner->save();
            return redirect()->route('banner.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            $banner = Banner::find($id);
            $banner->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}

