<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function index(){
        $wisata = DB::table('table_wisata')->get();
        return view ('front', compact('wisata'));
    }
}
