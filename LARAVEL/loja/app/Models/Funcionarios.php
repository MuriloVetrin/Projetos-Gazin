<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['name', 'email', 'password', 'verification_code'];
    protected $hidden = ['password', 'remember_token'];
}

