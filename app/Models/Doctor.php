<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model
{
    use Translatable, HasFactory;

    public $translatedAttributes = ['name', 'appointments'];
    public $translationModel = \App\Models\DoctorTranslations::class;
    public $fillable = ['email', 'email_verified_at', 'password', 'phone', 'price', 'name', 'appointments', 'section_id', 'status'];

    /*
     * =========================== Relations ===========================
    */

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
