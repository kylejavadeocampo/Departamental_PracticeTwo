<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //
    protected $table = 'equipments';
    protected $fillable =[
        'user_id',
        'EquipmentName', 
        'Category',
        'UnitPrice',
        'Description',
        'Availability'
    ];

    public function user() {
        return $this -> belongsTo(User::class);
    }
}
