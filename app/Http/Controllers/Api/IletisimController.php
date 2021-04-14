<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Iletisim;
use Illuminate\Http\Request;

class IletisimController extends Controller
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

        $list = Iletisim::query();
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
        $iletisim = new Iletisim;
        $iletisim->sira = $request->sira;
        $iletisim->baslik = $request->baslik;
        $iletisim->adres = $request->adres;
        $iletisim->telefon = $request->telefon;
        $iletisim->telefon2 = $request->telefon2;
        $iletisim->telefon3 = $request->telefon3;
        $iletisim->gsm = $request->gsm;
        $iletisim->fax = $request->fax;
        $iletisim->email = $request->email;
        $iletisim->neredeyiz = $request->neredeyiz;
        $iletisim->ulas = $request->ulas;
        $iletisim->aciklama = $request->aciklama;
        $iletisim->harita = $request->harita;
        $iletisim->dilgrup = $request->dilgrup;
        $iletisim->dil = $request->dil;
        $iletisim->save();

        return response([
            'data'=>$iletisim,
            'message'=>'Ilce created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iletisim  $iletisim
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iletisim = Iletisim::find($id);
        if ($iletisim)
            return response($iletisim,200);
        else
            return response(['message'=>'Iletisim not found! Baska id deneyin'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Iletisim  $iletisim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iletisim $iletisim)
    {
        $iletisim->sira = $request->sira;
        $iletisim->baslik = $request->baslik;
        $iletisim->adres = $request->adres;
        $iletisim->telefon = $request->telefon;
        $iletisim->telefon2 = $request->telefon2;
        $iletisim->telefon3 = $request->telefon3;
        $iletisim->gsm = $request->gsm;
        $iletisim->fax = $request->fax;
        $iletisim->email = $request->email;
        $iletisim->neredeyiz = $request->neredeyiz;
        $iletisim->ulas = $request->ulas;
        $iletisim->aciklama = $request->aciklama;
        $iletisim->harita = $request->harita;
        $iletisim->dilgrup = $request->dilgrup;
        $iletisim->dil = $request->dil;
        $iletisim->save();
        return response([
            'data'=>$iletisim,
            'message'=>'Iletisim updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iletisim  $iletisim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iletisim $iletisim)
    {
        $iletisim->delete();
        return response([
            'message'=> 'Iletisim deleted'
        ],200);
    }
}
