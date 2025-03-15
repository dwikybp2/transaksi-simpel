<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang.index');
    }

    public function transaksi($barangId)
    {
        return view('barang.transaksi', compact('barangId'));
    }

    public function dashboard()
    {
        return view('barang.dashboard');
    }
}
