<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ilce;
use Illuminate\Http\Request;

class IlceController extends Controller
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

        //$list = Ilce::query(); //queryBuilder yapısı olusturduk
        $list = Ilce::query();
        if ($request->has('search'))
            $list->where('adi','like','%'.$request->query('search').'%');
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
        $ilce = new Ilce;
        $ilce->adi = $request->adi;
        $ilce->il_id = $request->il_id;
        $ilce->save();
        return response([
            'data'=>$ilce,
            'message'=>'Ilce created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ilce  $ilce
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ilce = Ilce::find($id);
        if ($ilce)
            return response($ilce,200);
        else
            return response(['message'=>'İlce not found! Baska id deneyin'],404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ilce  $ilce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ilce $ilce)
    {
        $ilce->adi = $request->adi;
        $ilce->il_id = $request->il_id;
        $ilce->save();
        return response([
            'data'=>$ilce,
            'message'=>'İlce updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ilce  $ilce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ilce $ilce)
    {
        $ilce->delete();
        return response([
            'message'=> 'Ilce deleted'
        ],200);
    }
}
