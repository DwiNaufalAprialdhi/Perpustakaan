<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TransaksiJatuhTempo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routine:transaksiJatuhTempo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'admin : Mengubah status menjadi buku belum dikembalikan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        app('App\Http\Controllers\Cron\TransaksiJatuhTempoController')->jatuhTempo();
    }
}
