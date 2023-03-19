<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Memo;

class Directory extends Model
{
    use HasFactory;

    public function memo()
    {
        return $this->hasOne(Memo::class);
    }
}
