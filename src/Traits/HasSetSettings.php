<?php

namespace Bavix\Settings\Traits;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Services\WritableService;

trait HasSetSettings
{

    /**
     * @param string $key
     * @param int|null $value
     * @return int|null
     */
    public function setSettingInt(string $key, ?int $value = null): Setting
    {
        return app(WritableService::class)
            ->setSettingInt($this, $key, $value);
    }

    /**
     * @param string $key
     * @param float|null $value
     * @return float|null
     */
    public function setSettingFloat(string $key, ?float $value = null): Setting
    {
        return app(WritableService::class)
            ->setSettingFloat($this, $key, $value);
    }

    /**
     * @param string $key
     * @param bool|null $value
     * @return bool|null
     */
    public function setSettingBool(string $key, ?bool $value = null): Setting
    {
        return app(WritableService::class)
            ->setSettingBool($this, $key, $value);
    }

    /**
     * @param string $key
     * @param string|null $value
     * @return string|null
     */
    public function setSettingString(string $key, ?string $value = null): Setting
    {
        return app(WritableService::class)
            ->setSettingString($this, $key, $value);
    }

    /**
     * @param string $key
     * @param array|null $value
     * @return array|null
     */
    public function setSettingArray(string $key, ?array $value = null): Setting
    {
        return app(WritableService::class)
            ->setSettingArray($this, $key, $value);
    }

    /**
     * @param string $key
     * @param string $cast
     * @param mixed $value
     * @return Setting|null
     */
    public function setSetting(string $key, string $cast, $value): Setting
    {
        return app(WritableService::class)
            ->setSetting($this, $key, $cast, $value);
    }

}
