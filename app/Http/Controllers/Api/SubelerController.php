<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subeler;
use Illuminate\Http\Request;

class SubelerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offset = $request->has('offset') ? $request->query('offset'):0; // offset => vt de kayıtların nerden baslayacagını
        $limit = $request->has('limit') ? $request->query('limit'):10;  //limit => offsetten itibaren nereye kadar kac kayıt alınacagını belirtir.

        $list = Subeler::query();
        if ($request->has('search'))
            $list->where('baslik','like','%'.$request->query('search').'%');
        //return response(Ilce::offset($offset)->limit($limit)->get(),200);
        if ($request->has('sortBy'))
            $list->orderBy($request->query('sortBy'),$request->query('sort','DESC'));

        $data = $list->offset($offset)->limit($limit)->get();
        return response($data,200); // status 200 durum kodu
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subeler = new Subeler;
        $subeler->sira = $request->sira;
        $subeler->baslik = $request->baslik;
        $subeler->adres = $request->adres;
        $subeler->telefon = $request->telefon;
        $subeler->telefon2 = $request->telefon2;
        $subeler->telefon3 = $request->telefon3;
        $subeler->gsm = $request->gsm;
        $subeler->fax = $request->fax;
        $subeler->email = $request->email;
        $subeler->neredeyiz = $request->neredeyiz;
        $subeler->ulas = $request->ulas;
        $subeler->aciklama = $request->aciklama;
        $subeler->enlem = $request->enlem;
        $subeler->boylam = $request->boylam;
        $subeler->tur = $request->tur;
        $subeler->dilgrup = $request->dilgrup;
        $subeler->dil = $request->dil;
        $subeler->save();

        return response([
            'data'=>$subeler,
            'message'=>'Sube created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subeler  $subeler
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subeler = Subeler::find($id);
        if ($subeler)
            return response($subeler,200);
        else
            return response(['message'=>'Sube not found! Baska id deneyin'],404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subeler  $subeler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subeler $subeler)
    {
        $subeler->sira = $request->sira;
        $subeler->baslik = $request->baslik;
        $subeler->adres = $request->adres;
        $subeler->telefon = $request->telefon;
        $subeler->telefon2 = $request->telefon2;
        $subeler->telefon3 = $request->telefon3;
        $subeler->gsm = $request->gsm;
        $subeler->fax = $request->fax;
        $subeler->email = $request->email;
        $subeler->neredeyiz = $request->neredeyiz;
        $subeler->ulas = $request->ulas;
        $subeler->aciklama = $request->aciklama;
        $subeler->enlem = $request->enlem;
        $subeler->boylam = $request->boylam;
        $subeler->tur = $request->tur;
        $subeler->dilgrup = $request->dilgrup;
        $subeler->dil = $request->dil;
        $subeler->save();
        return response([
            'data'=>$subeler,
            'message'=>'Sube updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subeler  $subeler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subeler $subeler)
    {
        $subeler->delete();
        return response([
            'message'=> 'Sube deleted'
        ],200);
    }
}
