<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use App\Models\Satuan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'List Barang';

        $barangs = Barang::all();

        return view('barang.index', [
            'pageTitle' => $pageTitle,
            'barangs' => $barangs
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Barang';

        // ELOQUENT
        $satuans = Satuan::all();

        return view('barang.create', compact('pageTitle', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'kodeBarang' => 'required',
            'namaBarang' => 'required',
            'hargaBarang' => 'required|numeric',
            'deskripsiBarang' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $barang = New Barang;
        $barang->kode_barang = $request->kodeBarang;
        $barang->nama_barang = $request->namaBarang;
        $barang->harga_barang = $request->hargaBarang;
        $barang->deskripsi_barang = $request->deskripsiBarang;
        $barang->satuan_id = $request->satuan;
        $barang->save();

        return redirect()->route('barangs.index');
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
        $pageTitle = 'Edit Barang';

        // ELOQUENT
        $satuans = Satuan::all();
        $barangs = Barang::find($id);

        return view('barang.edit', compact('pageTitle', 'satuans', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'kodeBarang' => 'required',
            'namaBarang' => 'required',
            'hargaBarang' => 'required|numeric',
            'deskripsiBarang' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $barang = Barang::find($id);
        $barang->kode_barang = $request->kodeBarang;
        $barang->nama_barang = $request->namaBarang;
        $barang->harga_barang = $request->hargaBarang;
        $barang->deskripsi_barang = $request->deskripsiBarang;
        $barang->satuan_id = $request->satuan;
        $barang->save();

        return redirect()->route('barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::find($id)->delete();

        return redirect()->route('barangs.index');
    }
}
