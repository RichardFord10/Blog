<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChatGPTController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function chat(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/engines/gpt-3.5-turbo-instruct/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'prompt' => $request->input('prompt'),
                'max_tokens' => 150, // You can adjust this value
            ],
        ]);

        return response()->json(json_decode((string) $response->getBody(), true));
    }
}

