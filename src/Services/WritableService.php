<?php

namespace Bavix\Settings\Services;

use Bavix\Settings\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WritableService
{

    /**
     * @param Model $model
     * @param string $key
     * @param int|null $value
     * @return Setting
     */
    public function setSettingInt(Model $model, string $key, ?int $value = null): Setting
    {
        return $this->setSetting($model, $key, 'int', $value);
    }

    /**
     * @param Model $model
     * @param string $key
     * @param float|null $value
     * @return float|null
     */
    public function setSettingFloat(Model $model, string $key, ?float $value = null): Setting
    {
        return $this->setSetting($model, $key, 'float', $value);
    }

    /**
     * @param Model $model
     * @param string $key
     * @param bool|null $value
     * @return bool|null
     */
    public function setSettingBool(Model $model, string $key, ?bool $value = null): Setting
    {
        return $this->setSetting($model, $key, 'bool', $value);
    }

    /**
     * @param Model $model
     * @param string $key
     * @param string|null $value
     * @return string|null
     */
    public function setSettingString(Model $model, string $key, ?string $value = null): Setting
    {
        return $this->setSetting($model, $key, 'string', $value);
    }

    /**
     * @param Model $model
     * @param string $key
     * @param array|null $value
     * @return array|null
     */
    public function setSettingArray(Model $model, string $key, ?array $value = null): Setting
    {
        return $this->setSetting($model, $key, 'array', $value);
    }

    /**
     * @param Model $model
     * @param string $key
     * @param string $cast
     * @param mixed $value
     * @return Setting
     */
    protected function setSetting(Model $model, string $key, string $cast, $value): Setting
    {
        $setting = app(ReadableService::class)
            ->getSetting($model, $key);

        if (!$setting) {
            $setting = app(SettingService::class)
                ->create($model, $key, $cast, $value);

            /**
             * @var Collection $collection
             */
            $collection = $model->settings;
            $collection->push($setting);
            return $setting;
        }

        $setting->update(compact('cast', 'value'));
        return $setting;
    }

}
