<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['kategori_id', 'name', 'harga', 'foto'];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailtransaksi()
    {
        return $this->belongsTo(DetailTransaksi::class,'transaksi_id');
    }
}
