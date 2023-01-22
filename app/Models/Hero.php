<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the items for the blog post.
     */
    public function weapons() {
        return $this->belongsToMany(Weapon::class,'hero_weapons');
    }


}
