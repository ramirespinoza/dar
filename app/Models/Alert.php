<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $table = "alert";

    protected $fillable = [
        'message_id',
        'user_chat_id'
    ];
}
