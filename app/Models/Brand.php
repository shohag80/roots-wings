<?php

namespace App\Models;

use App\Events\BrandCreated;
use App\Events\BrandDeleted;
use App\Events\BrandUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    protected $dispatchesEvents = [
        'created' => BrandCreated::class,
        'updated' => BrandUpdated::class,
        'deleted' => BrandDeleted::class,
    ];
}
