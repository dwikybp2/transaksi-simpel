<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::withCount('transaksis');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereRaw('LOWER(nama) LIKE ?', ["%" . strtolower($search) . "%"])
                ->orWhereRaw('LOWER(jenis) LIKE ?', ["%" . strtolower($search) . "%"]);
        }

        $data = $query->orderBy('id')->paginate(5);

        return response()->json([
            'success' => true,
            'message' => "Data retrieved successfully",
            'data'    => $data,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'jenis' => 'required|string|max:255',
        ]);

        $barang = Barang::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'jenis' => $request->jenis,
        ]);

        return response()->json([
            'message' => 'Barang berhasil ditambahkan!',
            'data' => $barang
        ], 201);
    }
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'stok'  => 'required|integer',
            'jenis' => 'required|string|max:100',
        ]);

        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $barang->update([
            'nama'  => $request->nama,
            'stok'  => $request->stok,
            'jenis' => $request->jenis,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui',
            'data'    => $barang
        ]);
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus",
        ]);
    }

    public function transaksi(Request $request)
    {
        $barangId = $request->id;

        $query = Transaksi::where('barang_id', $barangId)->with('barang');

        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $query->whereRaw('LOWER(nama) LIKE ?', ["%" . strtolower($search) . "%"])
        //         ->orWhereRaw('LOWER(jenis) LIKE ?', ["%" . strtolower($search) . "%"]);
        // }

        $data = $query->orderBy('id')->paginate(10);
        $mappedData = $data->getCollection()->map(function ($item) {
            return [
                'id'            => $item->id,
                'nama_barang'   => $item->barang->nama ?? 'Unknown',
                'tanggal'       => $item->created_at->format('d-m-Y'),
            ];
        });

        return response()->json([
            'success' => true,
            'message' => "Data retrieved successfully",
            'data'    => [
                'current_page' => $data->currentPage(),
                'per_page'     => $data->perPage(),
                'total'        => $data->total(),
                'last_page'    => $data->lastPage(),
                'data'         => $mappedData,
            ],
        ]);
    }

    public function getChartData(Request $request)
    {
        $query = Transaksi::select('barangs.jenis', DB::raw('COUNT(transaksis.id) as total_transaksi'))
            ->join('barangs', 'barangs.id', '=', 'transaksis.barang_id')
            ->groupBy('barangs.jenis');

        // Filter berdasarkan rentang tanggal jika diberikan
        if ($request->start_date != '' && $request->end_date != '') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('transaksis.created_at', [$startDate, $endDate]);
        }

        $data = $query->orderBy('total_transaksi', 'DESC')->get();

        return response()->json($data);
    }
}
