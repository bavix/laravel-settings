<?php

namespace Bavix\Settings\Traits;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Services\ReadableService;

trait HasGetSettings
{

    /**
     * @param string $key
     * @param int|null $default
     * @return int|null
     */
    public function getSettingInt(string $key, ?int $default = null): ?int
    {
        return app(ReadableService::class)
            ->getSettingInt($this, $key, $default);
    }

    /**
     * @param string $key
     * @param float|null $default
     * @return float|null
     */
    public function getSettingFloat(string $key, ?float $default = null): ?float
    {
        return app(ReadableService::class)
            ->getSettingFloat($this, $key, $default);
    }

    /**
     * @param string $key
     * @param bool|null $default
     * @return bool|null
     */
    public function getSettingBool(string $key, ?bool $default = null): ?bool
    {
        return app(ReadableService::class)
            ->getSettingBool($this, $key, $default);
    }

    /**
     * @param string $key
     * @param string|null $default
     * @return string|null
     */
    public function getSettingString(string $key, ?string $default = null): ?string
    {
        return app(ReadableService::class)
            ->getSettingString($this, $key, $default);
    }

    /**
     * @param string $key
     * @param array|null $default
     * @return array|null
     */
    public function getSettingArray(string $key, ?array $default = null): ?array
    {
        return app(ReadableService::class)
            ->getSettingArray($this, $key, $default);
    }

    /**
     * @param string $key
     * @return Setting|null
     */
    public function getSetting(string $key): ?Setting
    {
        return app(ReadableService::class)
            ->getSetting($this, $key);
    }

}
