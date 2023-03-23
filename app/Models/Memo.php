<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Directory;

class Memo extends Model
{
    protected $fillable = ['directory_id', 'title', 'content'];
    use HasFactory;

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }
}
