<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';

    protected $fillable = [
        'mahasiswa_id',
        'jadwal_id'
    ];

    protected $casts = [
        'mahasiswa_id' => 'integer',
        'jadwal_id' => 'integer'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function mahasiswa()
    {
        return $this->belongsTo(
            Mahasiswa::class,
            'mahasiswa_id'
        );
    }

    public function jadwal()
    {
        return $this->belongsTo(
            Jadwal::class,
            'jadwal_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getNamaMahasiswaAttribute()
    {
        return optional($this->mahasiswa)->nama ?? '-';
    }

    public function getNamaMatakuliahAttribute()
    {
        return optional(
            optional($this->jadwal)->mataKuliah
        )->nama_mk ?? '-';
    }

    public function getNamaDosenAttribute()
    {
        return optional(
            optional($this->jadwal)->dosen
        )->nama ?? '-';
    }

    public function getKelasAttribute()
    {
        return optional($this->jadwal)->kelas ?? '-';
    }

    public function getHariAttribute()
    {
        return optional($this->jadwal)->hari ?? '-';
    }

    public function getJamAttribute()
    {
        return optional($this->jadwal)->jam ?? '-';
    }

    public function getInfoKrsAttribute()
    {
        return $this->nama_matakuliah .
               ' | ' .
               $this->nama_dosen .
               ' | ' .
               $this->hari .
               ' | ' .
               $this->jam .
               ' | ' .
               $this->kelas;
    }
}
