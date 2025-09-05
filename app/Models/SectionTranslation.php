<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    public $timestamps = false;
}
