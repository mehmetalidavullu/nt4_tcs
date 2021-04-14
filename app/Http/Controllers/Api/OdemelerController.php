<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Odemeler;
use Illuminate\Http\Request;

class OdemelerController extends Controller
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

        $list = Odemeler::query();
        if ($request->has('search'))
            $list->where('uye_id','=',$request->query('search'));
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
        $odemeler = new Odemeler;
        $odemeler->siparisno = $request->siparisno;
        $odemeler->uye_id = $request->uye_id;
        $odemeler->tutar = $request->tutar;
        $odemeler->tarih = $request->tarih;
        $odemeler->kartsahibinincepnumarasi = $request->kartsahibinincepnumarasi;
        $odemeler->aciklama = $request->aciklama;
        $odemeler->taksit = $request->taksit;
        $odemeler->kartno = $request->kartno;
        $odemeler->kartadi = $request->kartadi;
        $odemeler->save();

        return response([
            'data'=>$odemeler,
            'message'=>'Ödeme created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Odemeler  $odemeler
     * @return \Illuminate\Http\Response
     */
    public function show(Odemeler $odemeler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Odemeler  $odemeler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odemeler $odemeler)
    {
        $odemeler->siparisno = $request->siparisno;
        $odemeler->uye_id = $request->uye_id;
        $odemeler->tutar = $request->tutar;
        $odemeler->tarih = $request->tarih;
        $odemeler->kartsahibinincepnumarasi = $request->kartsahibinincepnumarasi;
        $odemeler->aciklama = $request->aciklama;
        $odemeler->taksit = $request->taksit;
        $odemeler->kartno = $request->kartno;
        $odemeler->kartadi = $request->kartadi;
        $odemeler->save();
        return response([
            'data'=>$odemeler,
            'message'=>'Ödeme updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odemeler  $odemeler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odemeler $odemeler)
    {
        $odemeler->delete();
        return response([
            'message'=> 'Odeme deleted'
        ],200);
    }
}
