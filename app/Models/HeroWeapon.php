<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroWeapon extends Model
{
    use HasFactory;


    public function hero()
    {
        return $this->belongsTo(Hero::class, 'id')->select(['id', 'name', 'health']);
    }

    public function weapon()
    {
        return $this->belongsTo(Weapon::class, 'id')->select(['id', 'name', 'damage', 'is_range']);
    }

}
