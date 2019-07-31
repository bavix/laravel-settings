<?php

namespace PHPSTORM_META {

    use Bavix\Settings\Services\ReadableService;

    override(\app(0), map([
        ReadableService::class => ReadableService::class,
    ]));

}
