<?php

namespace Bavix\Settings\Interfaces;

use Bavix\Settings\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Interface Settingable
 * @package Bavix\Settings\Interfaces
 * @property-read Setting[]|Collection $settings
 */
interface Settingable
{
    /**
     * @return MorphMany
     */
    public function settings(): MorphMany;
}
