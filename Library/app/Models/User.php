<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function rentRequests() {
    return $this->hasMany(RentRequest::class);
}

}
