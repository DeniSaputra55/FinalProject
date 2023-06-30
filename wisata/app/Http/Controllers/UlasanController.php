<?php

namespace App\Http\Controllers;
use App\Models\Ulasan;
use Illuminate\Support\Facades\DB;
use App\Models\Pengunjung;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ulasan = Ulasan::join('table_pengunjung', 'table_ulasan.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_ulasan.wisata_id', '=', 'table_wisata.id')
        ->select('table_ulasan.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->get();
        return view( ' admin.ulasan.index', compact('ulasan'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pengunjung = DB::table('table_pengunjung')->get();
        $wisata = DB::table('table_wisata')->get();
        $ulasan = Ulasan::join('table_pengunjung', 'table_ulasan.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_ulasan.wisata_id', '=', 'table_wisata.id')
        ->select('table_ulasan.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->get();
        return view( 'admin.ulasan.create', compact('ulasan', 'pengunjung', 'wisata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'pengunjung_id' => 'required|integer',
            'wisata_id' => 'required|integer',
            'komentar' => 'required',
           
        ],
        [
            'pengunjung.required' => 'pengunjung wajib diisi',
            'wisata.required' => 'wisata lahir wajib diisi',
            'komentar.required' => 'Ulasan wajib diisi',
           
            
        ]);
        //
        DB::table('table_ulasan')->insert([
            'komentar' => $request->komentar,
            'pengunjung_id'=> $request->pengunjung_id,
            'wisata_id'=> $request->wisata_id,
           
        ]);
        // Alert::success('Ulasan', 'Berhasil menambahkan data ulasan');
        return redirect('admin/ulasan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ulasan = Ulasan::join('table_pengunjung', 'table_ulasan.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_ulasan.wisata_id', '=', 'table_wisata.id')
        ->select('table_ulasan.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->where('table_ulasan.id', $id)
        ->get();
        return view ('admin.ulasan.detail', compact('ulasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pengunjung = DB::table('table_pengunjung')->get();
        $wisata = DB::table('table_wisata')->get();
        $ulasan = DB::table('table_ulasan')->where('id', $id)->get();

        return view ('admin.ulasan.edit', compact('ulasan', 'pengunjung','wisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'pengunjung_id' => 'required|integer',
            'wisata_id' => 'required|integer',
            'komentar' => 'required',
           
        ]);
        //
        DB::table('table_ulasan')->where('id', $request->id)->update([
            'komentar' => $request->komentar,
            'pengunjung_id'=> $request->pengunjung_id,
            'wisata_id'=> $request->wisata_id,
           
        ]);
        // Alert::info('Ulasan', 'Berhasil Mengedit data ulasan');
        return redirect('admin/ulasan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('table_ulasan')->where('id', $id)->delete();
        // Alert::info('Ulasan', 'Berhasil Menghapus data ulasan');
        return redirect('admin/ulasan');
    }

    public function exportPDF() {
        $data = Ulasan::join('table_pengunjung', 'table_ulasan.pengunjung_id', '=', 'table_pengunjung.id')
        ->join('table_wisata', 'table_ulasan.wisata_id', '=', 'table_wisata.id')
        ->select('table_ulasan.*', 'table_pengunjung.nama as pengunjung', 'table_wisata.nama as wisata')
        ->get();
    
        $pdf = Pdf::loadView('admin.ulasan.ulasanPDF', compact('data'));

        return $pdf->download('export_ulasan.pdf');
    }
}
