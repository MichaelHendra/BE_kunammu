<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamats';
    protected $fillable = ['user_id','alamat','kecamatan','region','provinsi','kode_pos'];
}
