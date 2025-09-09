<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Section extends Model implements TranslatableContract
{
    use Translatable, HasFactory;

    public $translatedAttributes = ['name'];

    protected $fillable = ['name'];

    /*
     * =========================== Relations ===========================
    */

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
