<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    // protected $table = mahasiswa;
    protected $primaryKey = "id";

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'fakultas'
    ];

    public function getDates()
    {
        //define the datetime table column names as below in an array, and you will get the
        //carbon objects for these fields in model objects.

        return array('created_at', 'updated_at');
    }
}
