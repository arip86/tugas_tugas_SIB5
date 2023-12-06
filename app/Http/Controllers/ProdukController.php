<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Jenis_produk;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukExport;
use PDF;
use App\Imports\ProdukImport;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //produk berelasi dengan jenis_produk
   
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->get();
        return view ('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //tambah data 
        $jenis_produk = DB::table('jenis_produk')->get();
        return view ('admin.produk.create', compact('jenis_produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'kode' => 'required|unique:produk|max:10',
            'nama' => 'required|max:45',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
            'deksripsi' => 'nullable|string|min:10',
            'jenis_produk_id' => 'required|integer',
        ],
        [
           
            'kode.max' => 'Kode maximal 10 karakter',
            'kode.required' => 'Kode Wajib Diisi',
            'kode.unique' => 'Kode Sudah terisi pada data lain',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'harga_beli.required' => 'Harga beli Harus diisi',
            'harga_beli.numeric' => 'Harus Angka',
            'harga_jual.required' => 'Harga jual harus disii',
            'harga_jual.numeric' => 'harus angka',
            'stok.required' => 'Stok harus diisi',
            'min_stok.required' => 'Minimal stok harus terisi',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File ekstensi harus jpg,jpeg, png, gif, svg',
        ]    
    );
        //proses upload foto
        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else{
            $fileName = '';
        }
        //tambah data menggunakan query builder
        DB::table('produk')->insert([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'min_stok'=>$request->min_stok,
            'foto'=>$fileName,
            'deskripsi'=>$request->deskripsi,
            'jenis_produk_id'=>$request->jenis_produk_id,
        ]);
        // Alert::success('Pelanggan', 'Berhasil menambahkan pelanggan');
        return redirect('admin/produk')->with('success', 'Produk Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */ 
    public function show(string $id)
    {
        //
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->where('produk.id', $id)
        ->get();
        return view ('admin.produk.detail', compact('produk'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jenis_produk = DB::table('jenis_produk')->get();
        $produk = DB::table('produk')->where('id',$id)->get();
        return view ('admin.produk.edit', compact('produk' , 'jenis_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        
        // try{
        $request->validate([
            'nama' => 'required|max:45',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
            'deksripsi' => 'nullable|string|min:10',
            'jenis_produk_id' => 'required|integer',
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'harga_beli.required' => 'Harga beli Harus diisi',
            'harga_beli.numeric' => 'Harus Angka',
            'harga_jual.required' => 'Harga jual harus disii',
            'harga_jual.numeric' => 'harus angka',
            'stok.required' => 'Stok harus diisi',
            'min_stok.required' => 'Minimal stok harus terisi',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File ekstensi harus jpg,jpeg, png, gif, svg',
        ] 
    );
        //update foto
        $foto = DB::table('produk')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        if(!empty($request->foto)){
            //jika ada foto lama maka hapus fotonya 
        if(!empty($namaFileFotoLama->foto)) unlink('admin/img'.$namaFileFotoLama->foto);
        //proses ganti foto
        $fileName = 'foto-'.$request->id . '.' . $request->foto->extension();
        $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }
        DB::table('produk')->where('id',$request->id)->update([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'min_stok'=>$request->min_stok,
            'foto'=>$fileName,
            'deskripsi'=>$request->deskripsi,
            'jenis_produk_id'=>$request->jenis_produk_id,
        ]);
    
        // Alert::success('Pelanggan', 'Berhasil mengupdate pelanggan');
        return redirect('admin/produk')->with('success', 'Produk Berhasil update!');

    // } catch (\Exception $e){

    //     // Alert::error('Pelanggan', 'Berhasil mengupdate pelanggan');
    //     return back()->with('errors', $validator->messages()->all()[0])->withInput();   
    // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('produk')->where('id', $id)->delete();
        // Alert::error('Produk', 'Berhasil Menghapus');
        return redirect('admin/produk')->withSuccess('Berhasil Menghapus Data Produk!');
    }
    public function generatePDF(){
        $data = [
            'title' => 'Welcome to export PDF',
            'date' => ('m/d/y')
        ];
        $pdf = PDF::loadView('admin.produk.myPDF', $data);
        return $pdf->download('testdownload.pdf');
    }
    public function produkPDF(){
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->get();
        $pdf = PDF::loadView('admin.produk.produkPDF', ['produk' => $produk])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function produkPDF_show(string $id){
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->where('produk.id', $id)
        ->get();
        $pdf = PDF::loadView('admin.produk.produkPDF_show', ['produk' => $produk]);
        return $pdf->stream();
    }
    public function exportProduk(){
        return Excel::download(new ProdukExport, 'produk.xlsx');
    }
    public function importProduk(Request $request) 
    {
        // Excel::import(new ProdukImport, 'produk.xlsx');
        // $file = $request->file('file');
        // $nama_file = rand().$file->getClientOriginalName();
        // $file->move('file_excel', $nama_file);
        // Excel::import(new ProdukImport, public_path('/file_excel'.$nama_file));
        Excel::import(new ProdukImport, $request->file('file')->store('temp'));
      
        
        return redirect('admin/produk')->with('success', 'Produk Berhasil diimport!');
    }
    public function apiProduk(){
        $produk = Produk::all();
        return response()->json([
            'success'=>true,
            'message' => 'Data Produk',
            'data'=>$produk
        ],200
    );
    }
    public function apiProdukDetail($id){
        $produk = Produk::find($id);
        if($produk){
            return response()->json([
                'success' => true,
                'message'=> 'Detail Produk',
                'data'=>$produk
            ], 200);
        }
        else {
            return response()->json([
                'success'=> false,
                'message'=>'Detail Produk Tidak ditemukan'
            ], 404);
        }
    }
}
