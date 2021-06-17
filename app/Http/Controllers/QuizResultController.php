<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'required|string|max:255',
            'result' => 'required|json',
        ]);

        $qr = new QuizResult();
        $qr->result = $validated['result'];
        $qr->name = $validated['name'];
        $qr->email = $validated['email'];
        $qr->ip = $request->ip();
        $qr->save();

        return response()->json($qr);
    }
}
