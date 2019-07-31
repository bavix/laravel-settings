<?php

namespace Bavix\Settings\Traits;

use Bavix\Settings\Models\Setting;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasSettings
{

    /**
     * @return MorphMany
     */
    public function settings(): MorphMany
    {
        return $this->morphMany(Setting::class, 'model');
    }

}
