<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";

    protected $fillable = [
        'firstName',
        'lastName',
        'name',
        'age',
        'address',
        'gender',
        'country',
        'birthdate',
    ];
    public function getDescriptionAtribute($value){
        return substr($value, 1, 120);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
