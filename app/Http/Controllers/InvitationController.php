<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function show(Guest $guest)
    {
        // Display the invitation page with guest details
        return view('invitation', compact('guest'));
    }
}
