<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'thumbnail',
        'path',
        'deskripsi',    
        'link_toko',
        // 'jumlah_penonton',
        // 'jumlah_suka',
        // 'hari_upload',
    ];
    protected $table="table_video";
    //protected $primaryKey="";

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
