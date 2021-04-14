<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referanslar;
use Illuminate\Http\Request;

class ReferanslarController extends Controller
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

        $list = Referanslar::query();
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
        $referanslar = new Referanslar;
        $referanslar->sira = $request->sira;
        $referanslar->baslik = $request->baslik;
        $referanslar->baslik2 = $request->baslik2;
        $referanslar->baslik3 = $request->baslik3;
        $referanslar->baslik4 = $request->baslik4;
        $referanslar->dilgrup = $request->dilgrup;
        $referanslar->dil = $request->dil;
        $referanslar->save();

        return response([
            'data'=>$referanslar,
            'message'=>'Referans created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referanslar  $referanslar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $referanslar = Referanslar::find($id);
        if ($referanslar)
            return response($referanslar,200);
        else
            return response(['message'=>'Referans not found! Baska id deneyin'],404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referanslar  $referanslar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referanslar $referanslar)
    {
        $referanslar->sira = $request->sira;
        $referanslar->baslik = $request->baslik;
        $referanslar->baslik2 = $request->baslik2;
        $referanslar->baslik3 = $request->baslik3;
        $referanslar->baslik4 = $request->baslik4;
        $referanslar->dilgrup = $request->dilgrup;
        $referanslar->dil = $request->dil;
        $referanslar->save();
        return response([
            'data'=>$referanslar,
            'message'=>'Referans updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referanslar  $referanslar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referanslar $referanslar)
    {
        $referanslar->delete();
        return response([
            'message'=> 'Referans deleted'
        ],200);
    }
}
