<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginOrRegister(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'car_id' => 'required|exists:cars,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        $client = Client::where('phone_number', $request->phone_number)->first();

        if ($client) {
            $client->tokens()->delete();

            $token = $client->createToken('client-token')->plainTextToken;

            $client->update($request->except('phone_number', 'token'));

            return response()->json([
                'message' => 'Client logged in successfully',
                'client' => $client,
                'token' => $token,
            ]);
        } else {
            $newClientData = $request->except('token');
            $newClient = Client::create($newClientData);

            $token = $newClient->createToken('client-token')->plainTextToken;

            return response()->json([
                'message' => 'Client registered successfully',
                'client' => $newClient,
                'token' => $token,
            ]);
        }
    }
}
