<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DashboardMemberController extends Controller
{
    public function index()
    {
        $data = DB::table('inventaris')->get();
            return view('pages.dashboardMember', compact ('data'));
    }

    public function store(Request $request, $id) {
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
        } elseif($request->tgl_peminjaman == NULL) {
            $json = [
                'msg'       => 'Mohon masukan tanggal peminjaman',
                'status'    => false
            ];
        } elseif($request->tgl_pengembalian == NULL) {
            $json = [
                'msg'       => 'Mohon masukan tanggal pengembalian',
                'status'    => false
            ];
        } elseif($request->total_biaya == NULL) {
            $json = [
                'msg'       => 'Mohon masukan total biaya',
                'status'    => false
            ];
        } elseif($request->status == NULL) {
            $json = [
                'msg'       => 'Mohon masukan status',
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
                    'tgl_peminjaman' => $request->tgl_peminjaman,
                    'tgl_pengembalian' => $request->tgl_pengembalian,
                    'total_biaya' => $request->total_biaya,
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

    public function show($id)
    {

        if(is_numeric($id))
        {
            $data = DB::table('members')->where('id', $id)->first();

            return Response::json($data);
        }

        $data = DB::table('members')
            ->select(['members.*'])
            ->orderBy('members.id', 'desc');

        return DataTables::of($data)
            ->editColumn(
                'harga',
                function($row) {
                    return number_format($row->harga);
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

    public function updateStatus($id)
    {
        $data = DB::table('invoices')->where('id', $id)->first();
        $dataStatus = $data->status;


            if($dataStatus == 'Aktif'){
                $dataStatus = 'Non-Aktif';
            } else {
                $dataStatus = 'Aktif';
            }

            try{

                DB::transaction(function() use($id, $dataStatus) {
                    DB::table('invoices')->where('id', $id)->update([
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status'=> $dataStatus,
                    ]);
                });

                $json = [
                    'msg' => 'Produk berhasil disunting',
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

    public function create()
    {
        return view('pages.pesan');
    }

}
