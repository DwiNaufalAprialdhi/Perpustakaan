<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    public function categories()
    {
        return $this->belongsTo('App\Model\Kategori', 'kategori_id', 'id');
    }
}
