<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\NoticiaController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SponsorController;
use App\Http\Controllers\admin\CursoController;
use App\Http\Controllers\admin\ParticipanteController;
use App\Http\Controllers\admin\ContadorController;

use App\Http\Controllers\web\WebController;

// ! admin 

Route::get('/login', function(){
	return redirect()->route('admin.login.get');
});

Route::get('/administrador', [AuthController::class,'showLoginForm'])->name('admin.login.get');
Route::post('/login', [AuthController::class,'login'])->name('admin.login');
Route::get('/admin_logout', [AuthController::class,'logout'])->name('admin.logout');
Route::group(['prefix' => 'admin'], function () {    
    Route::group(['middleware' => 'auth:admins'], function () {
        /*=============================== Inicio - Login =================================================*/
    		
        Route::get('/home', [HomeController::class,'index'])->name('home.index');
        Route::get('/banner', [HomeController::class,'banner'])->name('banner.index');

        /*=============================== Slider =========================================================*/
        
        Route::get('/slider',[SliderController::class,'index'])->name('slider.index');
        Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
        Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
        Route::get('slider/edit/{slider_id}', [SliderController::class,'edit'])->name('slider.edit');
        Route::put('slider/update/{slider_id}',[SliderController::class,'update'])->name('slider.update');
        Route::get('slider/delete/{slider_id}', [SliderController::class,'delete'])->name('slider.delete');

        /*=============================== Noticia =========================================================*/
       
        Route::get('/noticia',[NoticiaController::class,'index'])->name('noticia.index');
        Route::get('/noticia/create',[NoticiaController::class,'create'])->name('noticia.create');
        Route::post('/noticia/store',[NoticiaController::class,'store'])->name('noticia.store');
        Route::get('noticia/edit/{noticia_id}', [NoticiaController::class,'edit'])->name('noticia.edit');
        Route::put('noticia/update/{noticia_id}',[NoticiaController::class,'update'])->name('noticia.update');
        Route::get('noticia/delete/{noticia_id}', [NoticiaController::class,'delete'])->name('noticia.delete');

        /*=============================== Banner =========================================================*/
       
        Route::get('/banner',[BannerController::class,'index'])->name('banner.index');
        Route::get('/banner/create',[BannerController::class,'create'])->name('banner.create');
        Route::post('/banner/store',[BannerController::class,'store'])->name('banner.store');
        Route::get('banner/edit/{banner_id}', [BannerController::class,'edit'])->name('banner.edit');
        Route::put('banner/update/{banner_id}',[BannerController::class,'update'])->name('banner.update');
        Route::get('banner/delete/{banner_id}', [BannerController::class,'delete'])->name('banner.delete');

        /*=============================== Sponsor =========================================================*/
       
        Route::get('/sponsor',[SponsorController::class,'index'])->name('sponsor.index');
        Route::get('/sponsor/create',[SponsorController::class,'create'])->name('sponsor.create');
        Route::post('/sponsor/store',[SponsorController::class,'store'])->name('sponsor.store');
        Route::get('sponsor/edit/{sponsor_id}', [SponsorController::class,'edit'])->name('sponsor.edit');
        Route::put('sponsor/update/{sponsor_id}',[SponsorController::class,'update'])->name('sponsor.update');
        Route::get('sponsor/delete/{sponsor_id}', [SponsorController::class,'delete'])->name('sponsor.delete');

        /*=============================== Curso =========================================================*/
       
        Route::get('/curso',[CursoController::class,'index'])->name('curso.index');
        Route::get('/curso/create',[CursoController::class,'create'])->name('curso.create');
        Route::post('/curso/store',[CursoController::class,'store'])->name('curso.store');
        Route::get('curso/edit/{curso_id}', [CursoController::class,'edit'])->name('curso.edit');
        Route::put('curso/update/{curso_id}',[CursoController::class,'update'])->name('curso.update');
        Route::get('curso/delete/{curso_id}', [CursoController::class,'delete'])->name('curso.delete');

        /*=============================== Participante =========================================================*/
        
        Route::get('/entrante', [participanteController::class,'pendientes'])->name('participante.pendientes');
        Route::get('/finalizado', [participanteController::class,'finalizados'])->name('participante.finalizados');
        Route::get('/rechazado', [participanteController::class,'rechazados'])->name('participante.rechazados');
        Route::get('/participante/create',[participanteController::class,'create'])->name('participante.create');
        Route::post('/participante/store',[participanteController::class,'store'])->name('participante.store');
        Route::get('/enviado/{id}', [participanteController::class,'confirmarparticipante'])->name('participante.enviado');
        Route::get('/rechazado/{id}', [participanteController::class,'rechazarParticipante'])->name('participante.rechazado');
        Route::get('/aceptado/rechazado/{id}', [participanteController::class,'rechazarParticipanteAceptado'])->name('participante.aceptado.rechazado');
        Route::get('participante/delete/{participante_id}', [ParticipanteController::class,'delete'])->name('participante.delete');
        Route::get('participante/pendiente/delete/{participante_id}', [ParticipanteController::class,'deletependiente'])->name('participante.pendiente.delete');
        Route::get('participante/rechazado/delete/{participante_id}', [ParticipanteController::class,'deleterechazado'])->name('participante.rechazado.delete');
        Route::get('/reportes',[ParticipanteController::class,'historial'])->name('participante.historial');
        Route::get('participante/edit/{participante_id}', [ParticipanteController::class,'edit'])->name('participante.edit');
        Route::put('participante/update/{participante_id}',[ParticipanteController::class,'update'])->name('participante.update');
        Route::get('participante/pendiente/edit/{participante_id}', [ParticipanteController::class,'editPendientes'])->name('participante.pendiente.edit');
        Route::put('participante/pendiente/update/{participante_id}',[ParticipanteController::class,'updatePendientes'])->name('participante.pendiente.update');
        Route::get('participante/rechazado/edit/{participante_id}', [ParticipanteController::class,'editRechazados'])->name('participante.rechazado.edit');
        Route::put('participante/rechazado/update/{participante_id}',[ParticipanteController::class,'updateRechazados'])->name('participante.rechazado.update');
        Route::post('/consultar-reniec/{dni}',[participanteController::class,'consultaReniec'])->name('consultar-reniec');
        Route::get('/participante/certificado', [participanteController::class,'certificados'])->name('participante.certificados');

        Route::get('/participante/historial/{id_participante}', [participanteController::class,'historialParticipante'])->name('participante.cursos');
        Route::get('/participante/datos/{id_user}', [ParticipanteController::class,'datosParticipante'])->name('participante.datos');
        Route::get('/cursos/historial/create/{id_participante}',[ParticipanteController::class,'createCursosParticipante'])->name('curso.create.participante');
        Route::post('/cursos/historial/store',[ParticipanteController::class,'storeCursosParticipante'])->name('curso.store.participante');
        /*=============================== Contador =========================================================*/

        Route::get('/contador',[ContadorController::class,'index'])->name('contador.index');
        Route::get('/iniciado/{id}', [ContadorController::class,'iniciarContador'])->name('contador.iniciar');
        Route::get('/detenido/{id}', [ContadorController::class,'detenerContador'])->name('contador.detener');
        Route::get('contador/delete/{contador_id}',[ContadorController::class,'delete'])->name('contador.delete');
        Route::get('/contador/create',[ContadorController::class,'create'])->name('contador.create');
        Route::post('/contador/store',[ContadorController::class,'store'])->name('contador.store');
        Route::get('contador/edit/{contador_id}', [ContadorController::class,'edit'])->name('contador.edit');
        Route::put('contador/update/{contador_id}',[ContadorController::class,'update'])->name('contador.update');

       });
    });

// ! web

Route::get('/', [WebController::class,'index'])->name('web.index');
Route::get('/participante/{id}', [WebController::class,'participante'])->name('web.participante');
Route::post('/registro/participante', [WebController::class,'participanteStore'])->name('participante.web.store');