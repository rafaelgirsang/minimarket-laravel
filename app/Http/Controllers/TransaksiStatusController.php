<?php

namespace App\Http\Controllers;

use App\Models\TransaksiStatus;
use App\Http\Requests\StoreTransaksiStatusRequest;
use App\Http\Requests\UpdateTransaksiStatusRequest;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransaksiStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $filter = request(['search']);
        $data = TransaksiStatus::filter($filter)->paginate(show());

        return view('transaksi_status.index')->with([
            'title' => 'Status',
            'data' => $data,
        ]);
    }
}
