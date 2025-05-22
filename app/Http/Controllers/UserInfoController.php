<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\UserInfoFormRequest;
use App\Models\UserInfoModel;
use Illuminate\Support\Facades\Response;
use App\Jobs\SendEmail;
class UserInfoController extends BaseController
{
    public function writeData(UserInfoFormRequest $request){
        $validated=$request->validated(); 
        $psql=new UserInfoModel();
        $psql->name=$validated['name'];
        $psql->email=$validated['email'];
        $psql->number=$validated['number'];
        $letter=$psql->name.' '.$psql->email.' '.$psql->number.PHP_EOL;
        SendEmail::dispatch($letter);
        $psql->save();
        return Response::json(['message'=>'OK']);
        
    }
}
