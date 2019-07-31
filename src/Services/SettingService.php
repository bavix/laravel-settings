<?php

namespace Bavix\Settings\Services;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Traits\HasSettings;
use Illuminate\Database\Eloquent\Model;

class SettingService
{

    /**
     * @param Model $model
     * @param string $key
     * @param string $cast
     * @param mixed $value
     * @return Setting
     */
    public function create(Model $model, string $key, string $cast, $value): Setting
    {
        /**
         * @var HasSettings $model
         */
        return $model->settings()->create(\compact('key', 'cast', 'value'));
    }

}
