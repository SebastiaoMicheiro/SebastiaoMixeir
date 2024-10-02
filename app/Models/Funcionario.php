<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Reference\ReferenceParser;
use Override;

class Funcionario extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

}
