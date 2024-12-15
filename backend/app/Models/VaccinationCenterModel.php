<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationCenterModel extends Model
{
    use HasFactory;
    protected $table = 'vaccination_center';
    protected $fillable = [
        'center_name',
        'status'
    ];
}
