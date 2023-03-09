<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balance = DB::select("select a.saldo from akun a where a.id = 1;");
        $pemasukan = DB::select("SELECT SUM(t.nominal) AS 'pemasukan' FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id INNER JOIN jenis j ON k.jenis_id = j.id WHERE t.akun_id = 1 AND j.id=1 AND t.status=1;");
        $pengeluaran = DB::select("SELECT SUM(t.nominal) AS 'pengeluaran' FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id INNER JOIN jenis j ON k.jenis_id = j.id WHERE t.akun_id = 1 AND j.id=2 AND t.status=1;");

        $pemasukan_v = DB::select("SELECT SUM(t.nominal) AS 'pemasukan' FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id INNER JOIN jenis j ON k.jenis_id = j.id WHERE t.akun_id = 1 AND j.id=1 AND t.status=0;");
        $pengeluaran_v = DB::select("SELECT SUM(t.nominal) AS 'pengeluaran' FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id INNER JOIN jenis j ON k.jenis_id = j.id WHERE t.akun_id = 1 AND j.id=2 AND t.status=0;");


        return view('dashboard', compact('balance', 'pemasukan', 'pengeluaran', 'pemasukan_v', 'pengeluaran_v'));
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
    public function store(Request $request)
    {
        //
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

    public function pemasukanSetahun()
    {
        $pemasukan = DB::select("SELECT DATE_FORMAT(t.tanggal, '%M %Y') as 'tanggal', k.nama, SUM(t.nominal) AS 'pemasukan' FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id INNER JOIN jenis j ON k.jenis_id = j.id WHERE t.akun_id = 1 AND j.id=1 AND t.status=1 GROUP BY k.id, DATE_FORMAT(t.tanggal, '%Y%m');");
        return view('pemasukansetahun', compact('pemasukan'));
    }

    public function pengeluaranSetahun()
    {
        $pemasukan = DB::select("SELECT DATE_FORMAT(t.tanggal, '%M %Y') as 'tanggal', k.nama, SUM(t.nominal) AS 'pemasukan' FROM transaksi t INNER JOIN kategori k ON t.kategori_id = k.id INNER JOIN jenis j ON k.jenis_id = j.id WHERE t.akun_id = 1 AND j.id=2 AND t.status=1 GROUP BY k.id, DATE_FORMAT(t.tanggal, '%Y%m');");
        // return view('pengeluaransetahun', compact('pengeluaran'));
    }
}
