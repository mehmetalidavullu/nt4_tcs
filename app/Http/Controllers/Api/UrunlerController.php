<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Urunler;
use Illuminate\Http\Request;

class UrunlerController extends Controller
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

        $list = Urunler::query()->where('tur','=','0',);
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
        $urunler = new Urunler;
        $urunler->ustid = $request->ustid;
        $urunler->tur = $request->tur;
        $urunler->sira = $request->sira;
        $urunler->baslik = $request->baslik;
        $urunler->baslik2 = $request->baslik2;
        $urunler->baslik3 = $request->baslik3;
        $urunler->metin = $request->metin;
        $urunler->link = $request->link;
        $urunler->link1 = $request->link1;
        $urunler->link2 = $request->link2;
        $urunler->link3 = $request->link3;
        $urunler->hidden = $request->hidden;
        $urunler->acik = $request->acik;
        $urunler->tip = $request->tip;
        $urunler->dilgrup = $request->dilgrup;
        $urunler->dil = $request->dil;
        $urunler->description = $request->description;
        $urunler->keywords = $request->keywords;
        $urunler->save();

        return response([
            'data'=>$urunler,
            'message'=>'Created Success.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urunler  $urunler
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urunler  $urunler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urunler $urunler)
    {
        $urunler->ustid = $request->ustid;
        $urunler->tur = $request->tur;
        $urunler->sira = $request->sira;
        $urunler->baslik = $request->baslik;
        $urunler->baslik2 = $request->baslik2;
        $urunler->baslik3 = $request->baslik3;
        $urunler->metin = $request->metin;
        $urunler->link = $request->link;
        $urunler->link1 = $request->link1;
        $urunler->link2 = $request->link2;
        $urunler->link3 = $request->link3;
        $urunler->hidden = $request->hidden;
        $urunler->acik = $request->acik;
        $urunler->tip = $request->tip;
        $urunler->dilgrup = $request->dilgrup;
        $urunler->dil = $request->dil;
        $urunler->description = $request->description;
        $urunler->keywords = $request->keywords;
        $urunler->save();
        return response([
            'data'=>$urunler,
            'message'=>'Updated Success.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urunler  $urunler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urunler $urunler)
    {
        $urunler->delete();
        return response([
            'message'=> 'Deleted Success'
        ],200);
    }

    public function kategoriler(Request $request)
    {
        $offset = $request->has('offset') ? $request->query('offset'):0; // offset => vt de kayıtların nerden baslayacagını
        $limit = $request->has('limit') ? $request->query('limit'):10;  //limit => offsetten itibaren nereye kadar kac kayıt alınacagını belirtir.

        $list = Urunler::query()->where('tur','=','1',);
        if ($request->has('search'))
            $list->where('baslik','like','%'.$request->query('search').'%');
        //return response(Ilce::offset($offset)->limit($limit)->get(),200);
        if ($request->has('sortBy'))
            $list->orderBy($request->query('sortBy'),$request->query('sort','DESC'));

        $data = $list->offset($offset)->limit($limit)->get();
        return response($data,200); // status 200 durum kodu
    }
}
