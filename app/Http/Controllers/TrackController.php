<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\User;
use App\Models\Department;
use App\Models\Track;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }    

}