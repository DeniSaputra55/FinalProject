<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengunjung;
use App\Models\Wisata;
use App\Models\Rating;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\PDF;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rating = Rating::join('table_pengunjung', 'table_rating.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_rating.wisata_id', '=', 'table_wisata.id')
        ->select('table_rating.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->get();
        return view( ' admin.rating.index', compact('rating'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pengunjung = DB::table('table_pengunjung')->get();
        $wisata = DB::table('table_wisata')->get();
        $rating = Rating::join('table_pengunjung', 'table_rating.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_rating.wisata_id', '=', 'table_wisata.id')
        ->select('table_rating.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->get();
        return view( 'admin.rating.create', compact('rating', 'pengunjung', 'wisata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('table_rating')->insert([
            'nama' => $request->nama,
            'pengunjung_id'=> $request->pengunjung_id,
            'wisata_id'=> $request->wisata_id,
           
        ]);
        Alert::success('Rating', 'Berhasil menambahkan data rating');
        return redirect('admin/rating');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $rating = Rating::join('table_pengunjung', 'table_rating.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_rating.wisata_id', '=', 'table_wisata.id')
        ->select('table_rating.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->where('table_rating.id', $id)
        ->get();
        return view ('admin.rating.detail', compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pengunjung = DB::table('table_pengunjung')->get();
        $wisata = DB::table('table_wisata')->get();
        $rating = DB::table('table_rating')->where('id', $id)->get();

        return view ('admin.rating.edit', compact('rating', 'pengunjung','wisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('table_rating')->where('id', $request->id)->update([
            
            'pengunjung_id'=> $request->pengunjung_id,
            'wisata_id'=> $request->wisata_id,
            'nama' => $request->nama,
        ]);
        Alert::info('Rating', 'Berhasil Mengedit data rating');
        return redirect('admin/rating');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('table_rating')->where('id', $id)->delete();
        Alert::info('Rating', 'Berhasil Menghapus data rating');
        return redirect('admin/rating');
    }

    public function exportPDF() {
        $data = Rating::join('table_pengunjung', 'table_rating.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_rating.wisata_id', '=', 'table_wisata.id')
        ->select('table_rating.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->get();
    
        $pdf = Pdf::loadView('admin.rating.ratingPDF', compact('data'));

        return $pdf->download('export_rating.pdf');
    }
}
