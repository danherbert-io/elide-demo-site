<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\CommonModelProperties;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel implements CommonModelProperties
{
    protected static $unguarded = true;
}
