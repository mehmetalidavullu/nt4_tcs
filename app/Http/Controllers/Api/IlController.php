<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Il;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IlController extends Controller
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

        //$list = Il::query(); //queryBuilder yapısı olusturduk
        $list = Il::query()->with('ilceleri'); //urunle birlikte kategorilerinide aldık.
        if ($request->has('search'))
            $list->where('adi','like','%'.$request->query('search').'%');
        //return response(Product::offset($offset)->limit($limit)->get(),200);
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
        $il = new Il;
        $il->adi = $request->adi;
        $il->save();
        return response([
            'data'=>$il,
            'message'=>'Il created.'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Il  $il
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $il = Il::find($id);
        if ($il)
            return response($il,200);
        else
            return response(['message'=>'İl not found! Baska id deneyin'],404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Il  $il
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Il $il)
    {
        $il->adi = $request->adi;
        $il->save();
        return response([
            'data'=>$il,
            'message'=>'İl updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Il  $il
     * @return \Illuminate\Http\Response
     */
    public function destroy(Il $il)
    {
        $il->delete();
        return response([
            'message'=> 'Il deleted'
        ],200);
    }
}
