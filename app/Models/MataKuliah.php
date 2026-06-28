<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks'
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
            'mata_kuliah_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getInfoMkAttribute()
    {
        return $this->kode_mk . ' - ' . $this->nama_mk;
    }

    public function getJumlahKelasAttribute()
    {
        return $this->jadwals()->count();
    }
}
