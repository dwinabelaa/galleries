<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Home extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    // protected $guarded = ['id'];
    protected $fillable = ['name', 'user_id', 'kategoris_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }
}
