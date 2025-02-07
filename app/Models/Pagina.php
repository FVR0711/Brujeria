<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagina extends Model
{
    protected $fillable = [
        "titulo",
        "header_id",
        "nav_id",
        "aside_id",
        "section_id",
        "footer_id",
        "body",
        "path"
    ];

}
