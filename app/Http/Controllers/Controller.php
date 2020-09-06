<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function dataEmpty($param)
    {
        return response()->json([
            'message' => "Data {$param} kosong!"
        ], 404);
    }

    public function dataNotFound($param)
    {
        return response()->json([
            'message' => "Data {$param} tidak ditemukan!"
        ], 404);
    }

    public function storeTrue($param)
    {
        return response()->json([
            'message' => "Tambah data {$param} berhasil"
        ], 201);
    }

    public function storeFalse($param)
    {
        return response()->json([
            'message' => "Gagal menambah data {$param}!"
        ], 400);
    }

    public function updateTrue($param)
    {
        return response()->json([
            'message' => "Update data {$param} berhasil"
        ], 200);
    }

    public function updateFalse($param)
    {
        return response()->json([
            'message' => "Gagal mengupdate data {$param}!"
        ], 400);
    }

    public function destroyTrue($param)
    {
        return response()->json([
            'message' => "Hapus data {$param} berhasil"
        ], 200);
    }

    public function destroyFalse($param)
    {
        return response()->json([
            'message' => "Gagal menghapus data {$param}!"
        ], 400);
    }
}
