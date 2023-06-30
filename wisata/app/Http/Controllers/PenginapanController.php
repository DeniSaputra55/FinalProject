<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\penginapan;
use Illuminate\Support\Facades\DB;

class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penginapan = DB::table('table_penginapan')->get();
        return view('admin.penginapan.index', compact('penginapan'));
    }

    public function index_front()
    {
        //
        $penginapan = penginapan::all();
        return view('penginapan', compact('penginapan'));
    }
    public function detail($id)
    {

        $penginapan = penginapan::where('id', $id)->first();
        return view('penginapan-detail', compact('penginapan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.penginapan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|max:45',
        'fasilitas' => 'required',
        'alamat' => 'nullable|string|min:4',
        'harga' => 'required',
        'kelas' => 'required',
        'foto' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
    ], [
        'nama.required' => 'Nama wajib diisi',
        'nama.max' => 'Nama maksimal 45 karakter',
        'fasilitas.required' => 'Fasilitas wajib diisi',
        'foto.required' => 'Foto wajib diisi',
    ]);

    if ($request->hasFile('foto')) {
        $fileName = 'foto-'.uniqid().'.'.$request->foto->extension();
        $request->foto->move(public_path('admin/image'), $fileName);
    } else {
        $fileName = '';
    }

    DB::table('table_penginapan')->insert([
        'nama' => $request->nama,
        'fasilitas' => $request->fasilitas,
        'alamat' => $request->alamat,
        'harga' => $request->harga,
        'kelas' => $request->kelas,
        'foto' => $fileName,
    ]);

    return redirect('admin/penginapan')->with('success', 'Berhasil menambahkan data penginapan');
}

    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $penginapan = DB::table('table_penginapan')->where('id', $id)->get();

        return view ('admin.penginapan.detail', compact('penginapan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $penginapan = DB::table('table_penginapan')->where('id', $id)->get();

        return view('admin.penginapan.edit', compact('penginapan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|max:45',
            'fasilitas' => 'required',
            'alamat' => 'nullable|string|min:4',
            'harga' => 'required',
            'kelas' => 'required',
            'foto' => 'nullable|image|mimes:png,jps,jpeg,gif,svg|max:2048',
        ]);
        //foto lama apabila user mengganti fotonya

        $foto = DB::table('table_penginapan')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //apakah use ingin ganti foto lama
        if(!empty($request->foto)){
            //jika ada foto lama maka hapus dulu fotonya
        if(!empty($p->foto)) unlink('admin/image/'.$p->foto);
        //proses ganti foto
            $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
            $request->foto->move(public_path('admin/image'), $fileName);
        }
        else{
            $fileName = $namaFileFotoLama;
        }
        DB::table('table_penginapan')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'fasilitas' => $request->fasilitas,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'kelas' => $request->kelas,
            'foto' => $fileName,


        ]);
        // Alert::info('penginapan', 'Berhasil Mengedit data penginapan');
        return redirect('admin/penginapan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('table_penginapan')->where('id', $id)->delete();
        // Alert::info('penginapan', 'Berhasil Menghapus data penginapan');
        return redirect('admin/penginapan')->with('success', 'Berhasil Menghapus data penginapan');
    }
}
