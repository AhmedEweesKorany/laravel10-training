<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    // handle image storage 
    public function update(UpdateAvatarRequest $request){
        

        // handle image uploads
        // $path =  $request->file('avatar')->store('avatars','public');

        // other way to get path
        $path = Storage::disk('public')->put("avatars",$request->file('avatar'));

        // delte any existing avatars and replace it with the new path
        if($request->user()->avatar){
            Storage::disk('public')->delete($request->user()->avatar);
        }
        auth()->user()->update(['avatar'=>$path]);
        return redirect('/profile')->with(["message" => "Avatar is updated successfully"]);
    }
}
