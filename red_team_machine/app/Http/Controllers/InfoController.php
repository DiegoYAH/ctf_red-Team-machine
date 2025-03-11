<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function info($id) 
    {
        $infoUser = User::findOrFail($id);
        return view('pages.profile', ['infoUser' => $infoUser]);
    }

    public function infoUser($id) 
    {
        $infoUser = User::findOrFail($id);
        return $infoUser;
    }
}
