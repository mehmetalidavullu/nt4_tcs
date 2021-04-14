<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hizmetler;
use Illuminate\Http\Request;

class HizmetlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offset = $request->has('offset') ? $request->query('offset'):0;
        $limit = $request->has('limit') ? $request->query('limit'):10;

        $list = Hizmetler::query();
        if ($request->has('search'))
            $list->where('baslik','like','%'.$request->query('search').'%');
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
        $hizmetler = new Hizmetler;
        $hizmetler->sira = $request->sira;
        $hizmetler->baslik = $request->baslik;
        $hizmetler->metin = $request->metin;
        $hizmetler->enlem = $request->enlem;
        $hizmetler->boylam = $request->boylam;
        $hizmetler->tur = $request->tur;
        $hizmetler->dilgrup = $request->dilgrup;
        $hizmetler->dil = $request->dil;
        $hizmetler->save();

        return response([
            'data'=>$hizmetler,
            'message'=>'Hizmet created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hizmetler  $hizmetler
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hizmetler = Hizmetler::find($id);
        if ($hizmetler)
            return response($hizmetler,200);
        else
            return response(['message'=>'Hizmet not found! Baska id deneyin'],404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hizmetler  $hizmetler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hizmetler $hizmetler)
    {
        $hizmetler->sira = $request->sira;
        $hizmetler->baslik = $request->baslik;
        $hizmetler->metin = $request->metin;
        $hizmetler->enlem = $request->enlem;
        $hizmetler->boylam = $request->boylam;
        $hizmetler->tur = $request->tur;
        $hizmetler->dilgrup = $request->dilgrup;
        $hizmetler->dil = $request->dil;
        $hizmetler->save();
        return response([
            'data'=>$hizmetler,
            'message'=>'Hizmet updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hizmetler  $hizmetler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hizmetler $hizmetler)
    {
        $hizmetler->delete();
        return response([
            'message'=> 'Hizmet deleted'
        ],200);
    }
}
