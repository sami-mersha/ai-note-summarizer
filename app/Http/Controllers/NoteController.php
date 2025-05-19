<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NoteController extends Controller
{
    public function index()
    {
        return view('note');
    }

    public function summarize(Request $request)
    {
        $text = $request->input('note');

        $response = Http::withToken(env('HUGGINGFACE_API_TOKEN'))
            ->timeout(60)
            ->post('https://api-inference.huggingface.co/models/facebook/bart-large-cnn', [
                'inputs' => "summarize: $text"
            ]);

        if ($response->successful()) {
            $summary = $response->json()[0]['summary_text'] ?? 'No summary generated.';
            return view('note', compact('summary', 'text'));
        }

        return back()->withErrors(['error' => 'Failed to generate summary.']);
    }

}
