<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'peminjam';

    public function statuses()
    {
        return $this->belongsTo('App\Model\Status', 'status_id', 'id');
    }
}
