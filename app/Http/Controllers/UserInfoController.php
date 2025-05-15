<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\UserInfoFormRequest;
use App\Models\UserInfoModel;
use Illuminate\Support\Facades\Response;
class UserInfoController extends BaseController
{
    public function writeData(UserInfoFormRequest $request){
        $validated=$request->validated(); 
        $psql=new UserInfoModel();
        $psql->name=$validated['name'];
        $psql->email=$validated['email'];
        $psql->number=$validated['number'];
        $psql->save();
        return Response::json(['message'=>'OK']);
    }
}
