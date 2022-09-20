<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function newsletters() {
        $newsletters = DB::table('newsletters')->get();

        return view('admin.coupon.newsletters', compact('newsletters'));
    }
}
