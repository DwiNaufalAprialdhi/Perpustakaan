<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['status', 'denda'];
    protected $guarded = [];
    public function books()
    {
        return $this->belongsTo('App\Model\Buku', 'buku_id', 'id');
    }

    public function browwers()
    {
        return $this->belongsTo('App\Model\Peminjam', 'peminjam_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Model\Kategori', 'buku_id', 'id');
    }
}
