<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    // protected $table = 'members';
    // protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = ['firstName','lastName','userName','email','password'];
    use HasFactory;
}
