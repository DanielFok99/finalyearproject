<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AuthController extends Controller
{

    public function testHost()
    {
        info(url('/'));

        return QrCode::size(250)->generate(url('/').'/api');
//        return QrCode::generate('testing');
    }

    public function test()
    {
        return response()->json('test');
    }

    public function requestToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = Staff::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        info($user);

        return $user->createToken($request->device_name)->plainTextToken;
    }


    public function gadgetLogin(Request $request)
    {


    }

    public function adminLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me' => 'required|boolean',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $rememberMe = $request->input('remember_me');

        $user = Staff::where('email', $request->input('email'))->first();

        if (!Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $rememberMe) && $user->is_admin) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);

        }

        $response = new AdminResource($user);

        return response()->json($response, 201);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
