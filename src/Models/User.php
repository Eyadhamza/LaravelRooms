<?php


namespace TheProfessor\Laravelchatchannels\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TheProfessor\Laravelchatchannels\Traits\Participate;

class User extends Model
{
    use Participate;
    protected $guarded=[];


}