<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function lowongan()
    {
        return view('listing.job.index');
    }

    public function perusahaan()
    {
        return view('listing.company.index');
    }
}
