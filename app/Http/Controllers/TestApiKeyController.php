<?php

namespace App\Http\Controllers;

use App\Models\Keys;
use Illuminate\Http\Request;

class TestApiKeyController extends Controller
{
    // access the api key

    public function access_secure_endpoint()
{
    // Fetch the API key from the request header.
    $provided_api_key = strval(request()->header('API-Key'));

    // Fetch the encrypted API key from the database.
    $keys = Keys::where(['status' => true, 'type' => 'test', 'value' => $provided_api_key])->first();

    if ($keys) {
        // Valid API key found in the database.
        // You can proceed with your secure endpoint logic here.
        return response()->json(['status' => 'success','message' => 'a secure route'], 200);
    } else {
        // API key is invalid or not found.
        return response()->json(['status' => 'error', 'message' => 'invalid API key'], 401);
    }
}

}
