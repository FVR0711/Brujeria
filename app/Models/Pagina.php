<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagina extends Model
{
    protected $fillable = [
        "titulo",
        "body",
        "path",
    ];

}
