<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtikelModel;
class ItemController extends Controller
{
    //
    function index(){
        $listartikel = ArtikelModel::all();
        return view('tabelartikel',[
            'listartikel'=>$listartikel
        ]);
    }

    function store(Request $request){
        $artikel = new ArtikelModel;
        $artikel->judul = $request->input('judul');
        $artikel->isi = $request->input('isi');
        $artikel->tag = $request->input('tags');
        $artikel->slug = self::getslug($request->input('judul'));
        $artikel->save();

        return view('suksesahoy');
    }

    function getslug($title){
        $title = strtolower($title);
        for($x=0;$x<strlen($title);$x++){
            if($title[$x]==' '){
                $title[$x]='-';
            }
        }
        return $title;
    }

    function create(){
        return view('newarticle');
    }

    function show(){

    }
    
    function update(){

    }

    function destroy(){

    }
}
