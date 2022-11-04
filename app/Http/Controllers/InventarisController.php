<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class InventarisController extends Controller
{
    public function index()
    {
        $members = DB::table('members')->get();
        $inventaris = DB::table('inventaris')->get();

        $data = [
            'members'    => $members,
            'inventaris' => $inventaris,
            'script'     => 'components.scripts.inventaris'
        ];

        return view('pages.inventaris', $data);
    }

    public function show($id) {
        if(is_numeric($id))
        {
            $data = DB::table('inventaris')->where('id', $id)->first();

            $data->harga = number_format($data->harga);

            return Response::json($data);
        }

        $data = DB::table('inventaris')
            ->select(['inventaris.*'])
        ->orderBy('inventaris.id', 'desc');

        return DataTables::of($data)
            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id
                    ];

                    return view('components.buttons.inventaris', $data);
                }
            )

            ->editColumn(
                'harga',
                function($row) {
                    return number_format($row->harga);
                }
            )

            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        if($request->brand == NULL) {
            $json = [
                'msg'       => 'Mohon masukan Merk Laptop',
                'status'    => false
            ];
        } elseif($request->seri == NULL) {
            $json = [
                'msg'       => 'Mohon masukan Seri Laptop',
                'status'    => false
            ];
        } elseif($request->detail == NULL) {
            $json = [
                'msg'       => 'Mohon masukan detail laptop',
                'status'    => false
            ];
        } elseif($request->harga == NULL) {
            $json = [
                'msg'       => 'Mohon masukan harga',
                'status'    => false
            ];
        } elseif($request->stok == NULL) {
            $json = [
                'msg'       => 'Mohon masukan jumlah produk',
                'status'    => false
            ];
        } elseif($request->stok == 0) {
            $json = [
                'msg'       => 'Jumlah produk minimal 1',
                'status'    => false
            ];
        } else {
            try{
                DB::transaction(function() use($request) {
                    DB::table('inventaris')->insert([
                        'created_at' => date('Y-m-d H:i:s'),
                        'brand' => $request->brand,
                        'seri' => $request->seri,
                        'detail' => $request->detail,
                        'harga' => str_replace(',','',$request->harga),
                        'stok' => $request->stok,
                        // 'image' => $request->image,
                    ]);
                });

                $json = [
                    'msg' => 'Inventaris berhasil ditambahkan',
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

    public function update(Request $request, $id)
    {
        // dd($id);
        if($request->brand == NULL) {
            $json = [
                'msg'       => 'Mohon masukan Merk Laptop',
                'status'    => false
            ];
        } elseif($request->seri == NULL) {
            $json = [
                'msg'       => 'Mohon masukan Seri Laptop',
                'status'    => false
            ];
        } elseif($request->detail == NULL) {
            $json = [
                'msg'       => 'Mohon masukan detail laptop',
                'status'    => false
            ];
        } elseif($request->harga == NULL) {
            $json = [
                'msg'       => 'Mohon masukan harga',
                'status'    => false
            ];
        } elseif($request->stok == NULL) {
            $json = [
                'msg'       => 'Mohon masukan jumlah produk',
                'status'    => false
            ];
        } elseif($request->stok == 0) {
            $json = [
                'msg'       => 'Jumlah produk minimal 1',
                'status'    => false
            ];
        } else {
            try{
                DB::transaction(function() use($request, $id) {
                    DB::table('inventaris')->where('id', $id)->update([
                        'created_at' => date('Y-m-d H:i:s'),
                        'brand' => $request->brand,
                        'seri' => $request->seri,
                        'detail' => $request->detail,
                        'harga' => str_replace(',','',$request->harga),
                        'stok' => $request->stok,
                    ]);
                });

                $json = [
                    'msg' => 'Inventaris berhasil diubah',
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

    public function destroy($id)
    {
        try{
            DB::transaction(function() use($id){
                DB::table('inventaris')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Inventaris berhasil dihapus',
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
