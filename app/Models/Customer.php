<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function format()
    {
        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'created_by' => $this->user->email,
            'last_updated' => $this->updated_at->diffForHumans(),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
