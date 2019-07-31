<?php

namespace Bavix\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Setting extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'model_type',
        'model_id',
        'key',
        'cast',
        'value',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'cast' => 'string',
        'value' => 'custom',
    ];

    /**
     * @param string $key
     * @return string
     */
    protected function getCastType($key): string
    {
        if ($key === 'value') {
            return $this->cast ?? 'string';
        }

        return parent::getCastType($key);
    }

    /**
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }

}
