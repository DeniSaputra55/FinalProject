<?php

namespace App\Http\Controllers;

use App\Models\reviewwisata;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class ReviewWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wisata = DB::table('table_wisata')->get();

$review_wisata = DB::table('table_review_wisata')
    ->join('table_wisata', 'table_wisata.id', '=', 'table_review_wisata.wisata_id')
    ->select('table_wisata.nama as wisata', 'komentar')
    ->get();

return view('review_wisata', compact('wisata', 'review_wisata'));

    }

    public function index_admin()
    {
        //
        $wisata = DB::table('table_wisata')->get();
        
        $review_wisata = DB::table('table_review_wisata')
        ->join('table_wisata','table_review_wisata.wisata_id', '=', 'table_wisata.id')
        ->select('table_review_wisata.*', 'table_wisata.nama as wisata')
        ->get();
        
        return view ('admin.reviewwisata.index' , compact('wisata','review_wisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //isi datanya 
        DB::table('table_review_wisata')->insert([
            'nama' => $request->nama,
            'wisata_id' => $request->wisata_id,
            'komentar' => $request->komentar,
        ]);
        return redirect('/');
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
        DB::table('table_review_wisata')->where('id', $id)->delete();
        // Alert::info('Wisata', 'Berhasil Menghapus data wisata');
        return redirect('admin/reviewwisata')->with('success', 'Berhasil Menghapus data review');
    }
    
    public function exportPDF() {
        $ulasan = DB::table('table_review_wisata')
        ->join('table_wisata','table_review_wisata.wisata_id', '=', 'table_wisata.id')
        ->select('table_review_wisata.*', 'table_wisata.nama as wisata')
        ->get();
    
        $pdf = Pdf::loadView('admin.reviewwisata.reviewwisataPDF', compact('ulasan'));

        return $pdf->download('export_reviewwisata.pdf');
    }
}
