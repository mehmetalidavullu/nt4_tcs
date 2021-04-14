<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiparisDetay;
use Illuminate\Http\Request;

class SiparisDetayController extends Controller
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

        $list = SiparisDetay::query();
        if ($request->has('search'))
            $list->where('siparisno','=',$request->query('search'));

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
        $siparisDetay = new SiparisDetay;
        $siparisDetay->siparisid = $request->siparisid;
        $siparisDetay->siparisno = $request->siparisno;
        $siparisDetay->urunid = $request->urunid;
        $siparisDetay->adet = $request->adet;
        $siparisDetay->fiyat = $request->fiyat;
        $siparisDetay->varyant = $request->varyant;

        $siparisDetay->save();

        return response([
            'data'=>$siparisDetay,
            'message'=>'SiparisDetay created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiparisDetay  $siparisDetay
     * @return \Illuminate\Http\Response
     */
    public function show(SiparisDetay $siparisDetay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiparisDetay  $siparisDetay
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiparisDetay  $siparisDetay
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiparisDetay $siparisDetay)
    {
        $siparisDetay->delete();
        return response([
            'message'=> 'SiparisDetay deleted'
        ],200);
    }

    public function guncelle(Request $request, SiparisDetay $siparisDetay)
    {
        $siparisDetay = SiparisDetay::all();

        foreach ($siparisDetay as  $siparis)
        {
            if ($siparis->id == $request->id) {

                $siparis->siparisno = $request->siparisno;
                $siparis->siparisid = $request->siparisid;
                $siparis->urunid = $request->urunid;
                $siparis->adet = $request->adet;
                $siparis->fiyat = $request->fiyat;
                $siparis->varyant = $request->varyant;
                $siparis->save();
                return response([
                    'data'=>$siparis,
                    'message' => 'SiparisDetay updated.'
                ], 200);
            }
        }
        return response([
            'message'=> 'Böyle bir SiparişDetay bulunamadı!'
        ]);

    }


}
