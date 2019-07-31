<?php

namespace Bavix\Settings\Test\Models;

use Bavix\Settings\Traits\HasSettings;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasSettings;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email'];
}
