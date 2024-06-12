<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SerialNumber;
use Illuminate\Http\Request;

class SerialNumbersController extends Controller
{
    public function checkSerialNumber(Request $request)
    {
        $request->validate([
            'batch_id' => 'required|string',
            'code' => 'required|string',
        ]);

        $batch_id = $request->input('batch_id');
        $code = $request->input('code');

        $exists = SerialNumber::where('batch_id', $batch_id)->where('code', $code)->exists();

        return response()->json(['exists' => $exists]);
    }
}
