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

        $listartikel = ArtikelModel::all();
        return view('suksesahoy',[
            'listartikel'=>$listartikel
        ]);
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

    function show($id){
        $anArtikel = ArtikelModel::find($id);
        $kat = $anArtikel->tag;
        $tagslist = array();

        $stry = "";
        for($x=0;$x<strlen($kat);$x++){
            if($kat[$x]==',' ||$x==strlen($kat)-1){
                array_push($tagslist,$stry);
                $stry="";
            }else{
                $stry = $stry.$kat[$x];
            }
        }
        return view('getartikel',[
            "anArtikel"=>$anArtikel,
            "tagslist"=>$tagslist
        ]);
    }
    
    function update(Request $request,$id){
        $anArtikel = ArtikelModel::find($id);
        $anArtikel->judul = $request->input('judul');
        $anArtikel->isi = $request->input('isi');
        $anArtikel->tag = $request->input('tags');
        $anArtikel->save();

        $tagslist = array();
        $anArtikel = ArtikelModel::find($id);
        $kat = $anArtikel->tag;
        $stry = "";
        for($x=0;$x<strlen($kat);$x++){
            if($kat[$x]==',' ||$x==strlen($kat)-1){
                array_push($tagslist,$stry);
                $stry="";
            }else{
                $stry = $stry.$kat[$x];
            }
        }
        return view('getartikel',[
            "anArtikel"=>$anArtikel,
            "tagslist"=>$tagslist
        ]);

    }

    function destroy($id){
        $anArtikel = ArtikelModel::find($id);
        $anArtikel->delete();

        $listartikel = ArtikelModel::all();
        return view('tabelartikel',[
            'listartikel'=>$listartikel
        ]);

    }

    function edit($id){
        $anArtikel = ArtikelModel::find($id);
        return view('editartikel',[
            "anArtikel"=>$anArtikel
        ]);
    }
}
