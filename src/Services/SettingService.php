<?php

namespace Bavix\Settings\Services;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Traits\HasSettings;
use Illuminate\Database\Eloquent\Collection;
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
         * @var Setting $setting
         */
        $setting = $model->settings()
            ->create(\compact('key', 'cast', 'value'));

        /**
         * @var Collection $collection
         */
        $collection = $model->settings;
        $collection->push($setting);

        return $setting;
    }

    /**
     * @param Model $model
     * @param string $key
     * @return bool
     * @throws
     */
    public function delete(Model $model, string $key): bool
    {
        $setting = app(ReadableService::class)
            ->getSetting($model, $key);

        if ($setting) {
            /**
             * @var Collection $collection
             */
            $collection = $model->settings;
            foreach ($collection as $index => $item) {
                if ($item === $setting) {
                    $collection->forget($index);
                    break;
                }
            }

            return $setting->delete();
        }

        return false;
    }

}
