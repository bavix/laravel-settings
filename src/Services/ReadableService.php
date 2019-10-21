<?php

namespace Bavix\Settings\Services;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Interfaces\Settingable as Model;

class ReadableService
{

    /**
     * @param Model $model
     * @param string $key
     * @return Setting|null
     */
    public function getSetting(Model $model, string $key): ?Setting
    {
        foreach ($model->settings as $setting) {
            if ($setting->key === $key) {
                return $setting;
            }
        }

        return null;
    }

    /**
     * @param Model $model
     * @param string $key
     * @param int|null $default
     * @return int|null
     */
    public function getSettingInt(Model $model, string $key, ?int $default = null): ?int
    {
        return $this->getSetting($model, $key)->value ?? $default;
    }

    /**
     * @param Model $model
     * @param string $key
     * @param float|null $default
     * @return float|null
     */
    public function getSettingFloat(Model $model, string $key, ?float $default = null): ?float
    {
        return $this->getSetting($model, $key)->value ?? $default;
    }

    /**
     * @param Model $model
     * @param string $key
     * @param bool|null $default
     * @return bool|null
     */
    public function getSettingBool(Model $model, string $key, ?bool $default = null): ?bool
    {
        return $this->getSetting($model, $key)->value ?? $default;
    }

    /**
     * @param Model $model
     * @param string $key
     * @param string|null $default
     * @return string|null
     */
    public function getSettingString(Model $model, string $key, ?string $default = null): ?string
    {
        return $this->getSetting($model, $key)->value ?? $default;
    }

    /**
     * @param Model $model
     * @param string $key
     * @param array|null $default
     * @return array|null
     */
    public function getSettingArray(Model $model, string $key, ?array $default = null): ?array
    {
        return $this->getSetting($model, $key)->value ?? $default;
    }

}
