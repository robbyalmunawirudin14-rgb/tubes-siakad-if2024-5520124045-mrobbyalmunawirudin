<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nidn',
        'nama',
        'email'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function jadwals()
    {
        return $this->hasMany(
            Jadwal::class,
            'dosen_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getJumlahJadwalAttribute()
    {
        return $this->jadwals()->count();
    }

    public function getIdentitasAttribute()
    {
        return $this->nidn . ' - ' . $this->nama;
    }
}
