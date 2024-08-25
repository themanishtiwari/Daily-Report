<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    public function viewProfile(){
        $user = Auth::user();
        return view('web.account.profile', compact('user'));
    }

    function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'good_level' => 'required|integer|min:1|max:24',
            'moderate_level' => 'required|integer|min:1|max:24',
            'poor_level' => 'required|integer|min:0|max:24',
            'profile_pic' => 'nullable|image|max:1024',
        ]); 
        $user = User::find(Auth::id());

        #updating profile
        if($request->hasFile('profile_pic')){
            #delete old profile photo
            if(isset($user->profile_pic)){
                $oldimg= public_path($user->profile_pic);
                if(File::exists($oldimg)){                
                    File::delete($oldimg);
                }
            }

            #upload image
            $image=$request->file('profile_pic');
            $uploadPath="storage/uploads/profile/";

            $extension= $image->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $image->move("public/".$uploadPath, $filename);
            $imagepath=$uploadPath.$filename;
            $user->update(['profile_pic'=>$imagepath]);
        }

        User::find(Auth::id())->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'good_level'        => $request->good_level,
            'moderate_level'    => $request->moderate_level,
            'poor_level'        => $request->poor_level,
        ]);

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password updated successfully');
    }

    function googleLogin(){
        return Socialite::driver('google')->redirect();
    }


    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if(!$user)
        {
            $user = User::create([
                'name'          => $googleUser->name, 
                'email'         => $googleUser->email, 
                'avatar'        => $googleUser->avatar,
                'social_id'     => $googleUser->id,
                'social_type'   => 1,
                'password'      => \Hash::make(rand(100000,999999))
            ]);
        }
        else{
            User::find($user->id)->update([
                'avatar'            => $googleUser->avatar,
                'social_id'         => $googleUser->id,
                'social_type'       => 1
            ]);
        }
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
