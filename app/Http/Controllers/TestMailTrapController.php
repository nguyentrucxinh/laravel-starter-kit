<?php

namespace App\Http\Controllers;

use App\Mail\TestMailTrap;
use Illuminate\Support\Facades\Mail;

class TestMailTrapController extends Controller
{
    public function test()
    {
        Mail::to('john@example.com')->send(new TestMailTrap());
    }
}
