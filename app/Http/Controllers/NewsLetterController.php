<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;

class NewsLetterController extends Controller
{
    public function index(){
        $emails = NewsLetter::paginate(20);
        return view('admin.newsletter', compact('emails'));
    }

    public function store(Request $request){
        NewsLetter::create([
            'email' => $request->email
        ]);
        return back();
    }
}
