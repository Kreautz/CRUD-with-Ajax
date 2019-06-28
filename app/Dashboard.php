<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    // protected $table = mahasiswa;
    protected $primaryKey = "id";

    protected $fillable = [
        'nama',
        'alamat',
        'fakultas'
    ];
}
