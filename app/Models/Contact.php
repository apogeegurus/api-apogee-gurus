<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    const ISREPLY = 1;
    protected $fillable = ['name','email','subject','message','reply_message','status'];

}
