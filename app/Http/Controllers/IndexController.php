<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{

    public function create()
    {
        return view('create');
    }

    public function createEmail()
    {
        return view('createEmail');
    }

    public function addCreate(Request $request)
    {
        if($request->ajax()){
            // Валадируем данные
            $rules = [
                'data' => 'required|string|max:100',
            ];
            $niceNames = [
                'data' => 'Данные',
            ];
            $this->validate($request,[
                'data' => 'required|string|max:100',
            ], $rules, $niceNames);

            $data = $request->input('data');

            //Сохраняем в базу
            $add = new test();
            $add->data = Crypt::encryptString($data);
            $add->type = 0;
            $add->url = md5($data . microtime(true));
            $add->save();


            //Отправляем в шаблон
            $url = $add->url;
            return $url;
        }
    }

    public function addEmail(Request $request)
    {
        if($request->ajax()){
            // Валадируем данные
            $rules = [
                'data' => 'required|string|max:100',
                'email' => 'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/'
            ];
            $niceNames = [
                'data' => 'Данные',
                'email' => 'Email'
            ];
            $this->validate($request,[
                'data' => 'required|string|max:100',
                'email' => 'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/'
            ], $rules, $niceNames);

            $data = $request->input('data');
            $email = $request->input('email');

            //Сохраняем в базу
            $add = new test();
            $add->email = Crypt::encryptString($email);
            $add->data = Crypt::encryptString($data);
            $add->type = 1;
            $add->url = md5($data . microtime(true));
            $add->save();

            //Отправляем запрос на свою же почту
            Mail::to('testovi1232@gmail.com')->send(new \App\Mail\Url($add));
            Mail::to($email)->send(new \App\Mail\Url($add));

            //Отправляем в шаблон
            $url = $add->url;
            return $url;
        }
    }

    public function show(Request $request)
    {
        //Получаем данные и отправляем на шаблон
        $getData = test::all()->where('url', $request->key)->first();
        if(!$getData == null){
            $data = Crypt::decryptString($getData->data);
            $info = ['data' => $data];
            return view('show', ['info' => $info]);
        }else{
            return redirect('/');
        }
    }
}
