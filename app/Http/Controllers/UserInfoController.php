<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\UserInfoFormRequest;
use App\Models\UserInfoModel;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
class UserInfoController extends BaseController
{
    public function writeData(UserInfoFormRequest $request){
        $validated=$request->validated(); 
        $psql=new UserInfoModel();
        $psql->name=$validated['name'];
        $psql->email=$validated['email'];
        $psql->number=$validated['number'];
        
        $letter=$psql->name.' '.$psql->email.' '.$psql->number.PHP_EOL;
        Mail::raw($letter,function($message){
            $message->to(env("MAIL_ADMIN_RECEIVER"));
            $message->subject('New user');
        });
        $psql->save();
        return Response::json(['message'=>'OK']);
    }
}
