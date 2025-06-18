<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $fillable = [
    'roll_no',
    'candidate_name',
    'email',
    'mother_name',
    'oet_round',
    'oet_rank',
    'category',
     'admission_category',
    'amount',
];

}
