<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Inovice;

class Customer extends Model
{
    use HasFactory;

    public function invoice() {
        return $this-hasMany(Inovice::class);
    }
}
