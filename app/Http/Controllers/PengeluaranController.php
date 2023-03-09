<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = DB::select("SELECT t.id, t.tanggal, t.nominal, k.nama as 'kategori', t.keterangan, t.status FROM transaksi t INNER JOIN kategori k on t.kategori_id = k.id INNER JOIN jenis j ON k.jenis_id = j.id WHERE j.id = 2;");
        return view('daftarpengeluaran', compact('pengeluaran'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::select("select * from kategori");
        return view('tambahpengeluaran', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request);
         DB::table('transaksi')->insert([
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->transaction_date,
            'status' =>  0,
            'kategori_id' => $request->id_kategori,
            'akun_id' => 1,
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifikasi($id)
    {
        DB::statement("UPDATE `transaksi` SET `status` = '1' WHERE `transaksi`.`id` = $id;");
        return back();
    }
}
