<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function storeNewsletter(Request $request) {
        $request->validate([
            'email' => 'required|unique:newsletters,email|max:55',
        ]);

        $inputData = [
            'email' => $request->email
        ];

        DB::table('newsletters')->insert($inputData);

        return redirect()->back()->with('success', 'Thanks for subscribe');
    }
}
