<?php

namespace Bavix\Settings\Test\Models;

use Bavix\Settings\Traits\HasGetSettings;
use Bavix\Settings\Traits\HasSetSettings;
use Bavix\Settings\Traits\HasSettings;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasSettings;
    use HasGetSettings;
    use HasSetSettings;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email'];
}
