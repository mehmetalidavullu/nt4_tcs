<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Uyeler;
use Illuminate\Http\Request;

class UyelerController extends Controller
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
        $list = Uyeler::query();
        if ($request->has('search'))
            $list->where('isim','like','%'.$request->query('search').'%');
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
        if ($request->hasFile('avatar'))
        {
            $request->validate([ // veri eklenecek zorunlu alanları belirt !!
                'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048'

            ]);
            $avatar = uniqid().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/uyeler'),$avatar);
        }else
        {
            $avatar = null;
        }

        $uyeler = new Uyeler;
        $uyeler->isim = $request->isim;
        $uyeler->email = $request->email;
        $uyeler->sifre = md5($request->sifre);
        $uyeler->admin = $request->admin;
        $uyeler->yetki = $request->yetki;
        $uyeler->mail_token = $request->mail_token;
        $uyeler->avatar = $avatar;
        $uyeler->save();
        return response([
            'data'=>$uyeler,
            'message'=>'Uye created.'
        ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uyeler  $uyeler
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uyeler = Uyeler::find($id);
        if ($uyeler)
            return response($uyeler,200);
        else
            return response(['message'=>'Uye not found! Baska id deneyin'],404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uyeler  $uyeler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uyeler $uyeler)
    {
        $uyeler->isim = $request->isim;
        $uyeler->email = $request->email;
        $uyeler->sifre = md5($request->sifre);
        $uyeler->admin = $request->admin;
        $uyeler->yetki = $request->yetki;
        $uyeler->mail_token = $request->mail_token;
        $uyeler->save();
        return response([
            'data'=>$uyeler,
            'message'=>'Uye updated.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uyeler  $uyeler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uyeler $uyeler)
    {
        $path='images/uyeler/'.$uyeler->avatar;
        if (file_exists($path))
        {
            @unlink((public_path($path)));
        }
        $uyeler->delete();
        return response([
            'silinen resim' => $path,
            'message'=> 'Uye deleted'
        ],200);
    }

    public function login(Request $request, Uyeler $uyeler)
    {
        $uyeler = Uyeler::all();

        foreach ($uyeler as  $uye)
        {
            if ($uye->email == $request->email and $uye->sifre == md5($request->sifre))
            {
                return response([
                    'message'=> $uye->isim.' Hoş Geldiniz.'
                ],200);
            }
        }
        return response([
            'message'=> 'Kullanıcı adı veya Şifre Hatalı'
        ]);

    }
    public function avatar(Request $request,Uyeler $uyeler)
    {
        if ($request->hasFile('avatar'))
        {
            $request->validate([
                'id'=>'required|integer',
                'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $avatar = uniqid().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/uyeler'),$avatar);

            $uyeler = Uyeler::find($request->id);
            $old_avatar = $uyeler->avatar ;

            $uyeler->isim = $request->isim;
            $uyeler->email = $request->email;
            $uyeler->sifre = md5($request->sifre);
            $uyeler->admin = $request->admin;
            $uyeler->yetki = $request->yetki;
            $uyeler->mail_token = $request->mail_token;
            $uyeler->avatar = $avatar;
            $uyeler->save();

            $path='images/uyeler/'.$old_avatar;
            if (file_exists($path))
            {
                @unlink((public_path($path)));
            }
            return response([
                'data'=>$uyeler,
                'silinen'=>$old_avatar,
                'message'=>'Uye updated.'
            ],200);

        }else
            return 'error!';

    }
    public function forget(Request $request, Uyeler $uyeler)
    {
        $uyeler = Uyeler::all();

        foreach ($uyeler as  $uye)
        {
            if ($uye->email == $request->email)
            {
                if ($request->yeni_sifre == $request->yeni_sifre_tekrari)
                {
                    $uye->sifre = md5($request->yeni_sifre);
                    $uye->save();
                    return response([
                        'message'=> $uye->email.' Şifreniz Güncellendi.'
                    ],200);
                }
                return response([
                    'message'=> 'Yeni Girilen Şifreler Eşleşmedi!'
                ]);
            }
        }
        return response([
            'message'=> 'Böyle bir kullanıcı bulunamadı!'
        ]);

    }
}
