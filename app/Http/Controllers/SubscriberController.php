<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'unique:subscribers,email']
        ]);

        Subscriber::create($data);
        return back()->with('status', 'Subscribed Successfully..');
    }
}
