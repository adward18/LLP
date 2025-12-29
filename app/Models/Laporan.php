<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laporan';
    
    public $timestamps = true;

    protected $fillable = [
        'nama_pelapor',
        'email_pelapor',
        'nomor_telepon',
        'nama_penipu',
        'jenis_rekening',
        'nomor_rekening',
        'deskripsi',
        'bukti_images',
        'status',
        'admin_notes',
        'admin_id',
    ];

    protected $casts = [
        'bukti_images' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relasi ke Admin (yang verifikasi)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    // Relasi ke Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'laporan_id');
    }
}