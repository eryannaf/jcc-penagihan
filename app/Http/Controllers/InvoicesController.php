<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class InvoicesController extends Controller
{
    public function index()
    {
        $members = DB::table('members')->get();
        $inventaris = DB::table('inventaris')->get();

        $data = [
            'members' => $members,
            'inventaris' => $inventaris,
            'script'            => 'components.scripts.invoice'
        ];

        return view('pages.invoice', $data);
    }

    public function show($id)
    {

        if(is_numeric($id))
        {
            $data = DB::table('invoices')->where('id', $id)->first();

            return Response::json($data);
        }

        $data = DB::table('invoices')
            ->join('members', 'members.id', '=', 'invoices.member_id')
            ->join('inventaris', 'inventaris.id', '=', 'invoices.inventaris_id')
            ->select(['invoices.*', 'members.name as memberName', 'inventaris.brand as laptopName'])
            ->orderBy('invoices.id', 'desc');

        return DataTables::of($data)
            ->editColumn(
                'total_biaya',
                function($row) {
                    return number_format($row->total_biaya);
                }
            )

            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id
                    ];

                    return view('components.buttons.invoice', $data);
                }
            )

            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        if($request->has('member_id') == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama member',
                'status'    => false
            ];
        } elseif(!$request->has('inventaris_id')) {
            $json = [
                'msg'       => 'Mohon pilih nama inventaris',
                'status'    => false
            ];
        } elseif($request->pinjam == NULL) {
            $json = [
                'msg'       => 'Mohon masukan tanggal peminjaman',
                'status'    => false
            ];
        } elseif($request->balik == NULL) {
            $json = [
                'msg'       => 'Mohon masukan tanggal pengembalian',
                'status'    => false
            ];
        } elseif($request->total == NULL) {
            $json = [
                'msg'       => 'Mohon masukan total biaya',
                'status'    => false
            ];
        } elseif($request->quantity == NULL) {
            $json = [
                'msg'       => 'Mohon masukan jumlah',
                'status'    => false
            ];
        } else {
            try{

            DB::transaction(function() use($request) {
                $id_products = DB::table('invoices')->insertGetId([
                    'created_at' => date('Y-m-d H:i:s'),
                    'member_id' => $request->member_id,
                    'inventaris_id' => $request->inventaris_id,
                    'tgl_peminjaman' => $request->pinjam,
                    'tgl_pengembalian' => $request->balik,
                    'total_biaya' => $request->total,
                    'status' => 'Aktif',
                    'quantity' => $request->quantity,
                ]);

            });

                $json = [
                    'msg' => 'Produk berhasil ditambahkan',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }

        return Response::json($json);
    }

    public function updateStatus($id)
    {
        $data = DB::table('invoices')->where('id', $id)->first();
        $dataStatus = $data->status;


            if($dataStatus == 'Lunas'){
                $dataStatus = 'Belum Lunas';
            } else {
                $dataStatus = 'Lunas';
            }

            try{

                DB::transaction(function() use($id, $dataStatus) {
                    DB::table('invoices')->where('id', $id)->update([
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status'=> $dataStatus,
                    ]);
                });

                $json = [
                    'msg' => 'Pembayaran berhasil disunting',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e,
                    'line'      => $e->getLine(),
                    'message'   => $e->getMessage(),
                ];
            }

        return Response::json($json);
    }

    public function destroy($id)
    {
        try{
            DB::transaction(function() use($id){
                DB::table('invoices')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Member berhasil dihapus',
                'status' => true
            ];
        } catch(Exception $e){
            $json = [
                'msg' => 'error',
                'status' => false,
                'e' => $e,
            ];
        };

        return Response::json($json);
    }
}
