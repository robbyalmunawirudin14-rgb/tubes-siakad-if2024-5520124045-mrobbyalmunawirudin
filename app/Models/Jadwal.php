<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'dosen_id',
        'mata_kuliah_id',
        'hari',
        'jam',
        'kelas'
    ];

    protected $casts = [
        'dosen_id' => 'integer',
        'mata_kuliah_id' => 'integer'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function dosen()
    {
        return $this->belongsTo(
            Dosen::class,
            'dosen_id'
        );
    }

    public function mataKuliah()
    {
        return $this->belongsTo(
            MataKuliah::class,
            'mata_kuliah_id'
        );
    }

    public function krs()
    {
        return $this->hasMany(
            Krs::class,
            'jadwal_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getNamaDosenAttribute()
    {
        return $this->dosen->nama ?? '-';
    }

    public function getNamaMatakuliahAttribute()
    {
        return $this->mataKuliah->nama_mk ?? '-';
    }

    public function getJadwalLengkapAttribute()
    {
        return $this->hari .
               ' | ' .
               $this->jam .
               ' | ' .
               $this->kelas;
    }

    public function getInfoJadwalAttribute()
    {
        return ($this->mataKuliah->nama_mk ?? '-') .
               ' | ' .
               ($this->dosen->nama ?? '-') .
               ' | ' .
               $this->hari .
               ' | ' .
               $this->jam .
               ' | ' .
               $this->kelas;
    }

    public function getJumlahPesertaAttribute()
    {
        return $this->krs()->count();
    }
}
