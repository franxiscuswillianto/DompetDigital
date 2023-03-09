<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        DB::statement("UPDATE `transaksi` SET `status` = '1' WHERE `transaksi`.`id` = $id;");
        $transaksi = DB::select("SELECT t.id, t.nominal, k.jenis_id FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id WHERE t.id = $id;");
        $balance = DB::select("select a.saldo from akun a where a.id = 1;")[0]->saldo;
        if ($transaksi[0]->jenis_id == 1) {
            $balance += $transaksi[0]->nominal;
        }else{
            $balance -= $transaksi[0]->nominal;
        }
        DB::statement("UPDATE `akun` SET `saldo` = $balance WHERE `akun`.`id` = 1;");
        return redirect()->route('dashboardanak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = DB::select("SELECT *, t.id 'id_transaksi' FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id WHERE t.id = $id;");
        $kategori = DB::select("select * from kategori k");
        return view("ubahtransaksi", compact('transaksi', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // dd($request);
        DB::statement("UPDATE `transaksi` SET `nominal` = '$request->nominal', `keterangan` = '$request->keterangan', `tanggal` = '$request->transaction_date', `kategori_id` = '$request->id_kategori' WHERE `transaksi`.`id` = $request->id;");
        return redirect()->route('dashboardanak');
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
        // DB::statement("UPDATE `transaksi` SET `status` = '1' WHERE `transaksi`.`id` = $id;");
        // $transaksi = DB::select("SELECT t.id, t.nominal, k.jenis_id FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id WHERE t.id = $id;");
        // $balance = DB::select("select a.saldo from akun a where a.id = 1;")[0]->saldo;
        // if ($transaksi[0]->jenis_id == 1) {
        //     $balance += $transaksi[0]->nominal;
        // }else{
        //     $balance -= $transaksi[0]->nominal;
        // }
        // DB::statement("UPDATE `akun` SET `saldo` = $balance WHERE `akun`.`id` = 1;");
        DB::statement("DELETE FROM `transaksi` WHERE `transaksi`.`id` = $id");
        return redirect()->route('dashboardanak');
    }
}
