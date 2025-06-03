<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    public function rentRequest() {
    return $this->hasMany(RentRequest::class);
}
}
