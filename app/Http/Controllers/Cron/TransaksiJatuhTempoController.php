<?php

namespace App\Http\Controllers\Cron;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan;

use App\Eloquents\TransactionServices;

use Carbon\Carbon;
use Mail;

use App\Mail\NotificationTransactionService;
use App\Model\Transaksi;

// use App\Excels\ExportFromCollection;

class TransaksiJatuhTempoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Role Foundation Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the management of user role entity
    | role will be used on transaction, donatur accounts and donation account.
    |
    */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct();
    }
    /**
     * Show the role list page.
     *
     * @return \Illuminate\Http\Response
     */

    public function callCron($cron_name)
    {
        Artisan::call($cron_name);
        return redirect()->to('/');
    }

    public function jatuhTempo()
    {
        $transaksi = Transaksi::where('status', '0')->get();

        foreach ($transaksi as $row) {
            $denda = $row->denda + 1000;
            // dd($denda);
            if (\Carbon\Carbon::now() >= $row->tanggal_jatuh_tempo) {
                $row->update(['status' => 2]);
                $row->update(['denda' => $denda]);
                // dd($row);
            }
        }

        $transaksi = $this->denda();
    }

    public function denda()
    {
        $transaksi = Transaksi::where('status', '2')->get();

        foreach ($transaksi as $row) {
            $denda = $row->denda + 1000;
            // dd($denda);
            $row->update(['denda' => $denda]);
            // dd($row);
        }
    }
}
