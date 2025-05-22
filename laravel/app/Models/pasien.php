<?php

namespace App\Models;
use illuminate\database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;

    public function kunjungan()
{
        return $this->hasMany(kunjungan::class);
    }

}
