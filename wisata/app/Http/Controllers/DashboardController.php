<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Pengunjung;
use App\Models\Wisata;
use App\Models\Ulasan;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

session_id("pariwisata");
session_start();

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $wisata     = Wisata::count();
        $ulasan     = Ulasan::count();
        // $rating     = Rating::count();
        $totalUsers = DB::table('users')->count();
        $totalWisata = DB::table('table_wisata')->count();
        $totalUlasan = DB::table('table_review_wisata')->count();
        $ar_user = DB::table('users')
        ->selectRaw('role, count(role) as jumlah')
        ->groupBy('role')
        ->get();
        $ar_wilayah = DB::table('table_wisata')
        ->selectRaw('kota, count(kota) as jumlah')
        ->groupBy('kota')
        ->get();
         return view('admin.dashboard', compact('wisata','ulasan','ar_user', 'ar_wilayah', 'totalUsers','totalWisata','totalUlasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
