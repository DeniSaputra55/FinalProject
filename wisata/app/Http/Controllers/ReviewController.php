<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trips = Wisata::all();
        
        
        return view ('review' , compact('trips'));
    }

    public function index_admin()
    {
        //
        
        $ulasan = Review::all();
        
        return view ('admin.review.index' , compact('ulasan'));
    }


    public function detail($id)
    {

        $trips = Wisata::where('id', $id)->first();
        return view('trips-detail', compact('trips'));
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
         //isi datanya 
         DB::table('review')->insert([
            'nama' => $request->nama,
            'wisata' => $request->wisata,
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
        DB::table('review')->where('id', $id)->delete();
        // Alert::info('Wisata', 'Berhasil Menghapus data wisata');
        return redirect('admin/review')->with('success', 'Berhasil Menghapus data review');
    }

    public function exportPDF() {
        $ulasan = Review::all();
    
        $pdf = Pdf::loadView('admin.review.reviewPDF', compact('ulasan'));

        return $pdf->download('export_review.pdf');
    }
}
