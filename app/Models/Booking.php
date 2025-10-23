<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_hp',
        'jasa',
        'tgl_pemesanan',
        'tgl_kedatangan',
        'status',
        'user_id',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
