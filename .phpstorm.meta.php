<?php

namespace PHPSTORM_META {

    use Bavix\Settings\Services\SettingService;
    use Bavix\Settings\Services\ReadableService;
    use Bavix\Settings\Services\WritableService;

    override(\app(0), map([
        SettingService::class => SettingService::class,
        ReadableService::class => ReadableService::class,
        WritableService::class => WritableService::class,
    ]));

}
