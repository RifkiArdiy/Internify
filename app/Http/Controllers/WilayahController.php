<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    //
    public function getRegencies(Request $request)
    {
        return Regency::where('province_id', $request->province_id)->get();
    }

    public function getDistricts(Request $request)
    {
        return District::where('regency_id', $request->regency_id)->get();
    }

    public function getVillages(Request $request)
    {
        return Village::where('district_id', $request->district_id)->get();
    }
}
