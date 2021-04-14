<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siparisler;
use Illuminate\Http\Request;

class SiparislerController extends Controller
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

        $list = Siparisler::query()->with('siparisDetay');
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
        $siparisler = new Siparisler;
        $siparisler->siparisno = $request->siparisno;
        $siparisler->tarih = $request->tarih;
        $siparisler->gonderimtarihi = $request->gonderimtarihi;
        $siparisler->firmaid = $request->firmaid;
        $siparisler->adresid = $request->adresid;
        $siparisler->aciklama = $request->aciklama;
        $siparisler->email = $request->email;
        $siparisler->odemetipi = $request->odemetipi;

        $siparisler->save();

        return response([
            'data'=>$siparisler,
            'message'=>'Siparis created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siparisler  $siparisler
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siparisler  $siparisler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siparisler $siparisler)
    {
        $siparisler->siparisno = $request->siparisno;
        $siparisler->tarih = $request->tarih;
        $siparisler->gonderimtarihi = $request->gonderimtarihi;
        $siparisler->firmaid = $request->firmaid;
        $siparisler->adresid = $request->adresid;
        $siparisler->aciklama = $request->aciklama;
        $siparisler->email = $request->email;
        $siparisler->odemetipi = $request->odemetipi;
        $siparisler->save();
        return response([
            'data'=>$siparisler,
            'message'=>'Siparis updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siparisler  $siparisler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siparisler $siparisler)
    {
        $siparisler->delete();
        return response([
            'message'=> 'Siparis deleted'
        ],200);
    }
}
