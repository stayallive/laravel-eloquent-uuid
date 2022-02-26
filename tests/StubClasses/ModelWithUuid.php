<?php

namespace Tests\StubClasses;

use Illuminate\Database\Eloquent\Model;
use Stayallive\Laravel\Eloquent\UUID\UsesUUID;

/**
 * @property string|null $id
 * @property string|null $other_id
 * @property string      $name
 */
class ModelWithUuid extends Model
{
    use UsesUUID;

    protected static $unguarded = true;

    protected $table = 'tests';

    public $timestamps = false;
}
