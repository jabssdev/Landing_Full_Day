<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use PhpParser\Node\Stmt\TryCatch;

class SliderController extends Controller
{
     public function index() {
         $sliders=Slider::orderby('created_at', 'desc')->get();
         return view('admin.pages.slider.index')->with(['sliders'=> $sliders]);
     }
    
    public function create(){
        return view('admin.pages.slider.create');
    }

    public function store(Request $request){
        
        try{
            $slider = new Slider();
            $slider->titulo=$request->titulo;
            $slider->subtitulo=$request->subtitulo;
            $slider->video=$request->video;
           
            if ($request->file('imagen_web')) {
                $file=$request->file('imagen_web');
                $name='slider_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/slider_img/'; //public_path = http:
                $file->move($path,$name);
                $slider->imagen_web=$name;
            } 
            if ($request->file('imagen_movil')) {
                $file=$request->file('imagen_movil');
                $name='slider_movil_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/slider_img_movil/'; //public_path = http:
                $file->move($path,$name);
                $slider->imagen_movil=$name;
            }
            $slider->save();
            return redirect()->route('slider.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function edit($id){
        $slider=Slider::find($id);
        return view('admin.pages.slider.edit')->with(['slider'=> $slider]);
    }

    public function update(Request $request, $id){
        try{
            $slider=Slider::find($id);
            $slider->titulo=$request->titulo;
            $slider->subtitulo=$request->subtitulo;
            $slider->video=$request->video;
            if ($request->file('imagen_web')) {
                $file = $request->file('imagen_web');
                $name='slider_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/slider_img/';

                $file->move($path, $name);
                if ($slider->imagen_web){
                    if(file_exists( $path.$slider->imagen_web)){
                        unlink($path.$slider->imagen_web);
                    }
                }
                $slider->imagen_web = $name;
            }
            if ($request->file('imagen_movil')) {
                $file = $request->file('imagen_movil');
                $name='slider_movil_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/slider_img_movil/';

                $file->move($path, $name);
                if ($slider->imagen_movil){
                    if(file_exists( $path.$slider->imagen_movil)){
                        unlink($path.$slider->imagen_movil);
                    }
                }
                $slider->imagen_movil = $name;
            }
            $slider->save();
            return redirect()->route('slider.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            $slider = Slider::find($id);
            $slider->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
