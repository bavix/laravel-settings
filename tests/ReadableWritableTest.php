<?php

namespace Bavix\Settings\Test;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Services\ReadableService;
use Bavix\Settings\Services\SettingService;
use Bavix\Settings\Test\Models\User;
use Carbon\Carbon;

class ReadableWritableTest extends TestCase
{

    /**
     * @return void
     */
    public function testSetting(): void
    {
        $carbon = now();

        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $this->assertNull($user->getSetting('val'));
        $user->setSetting('val', 'datetime', $carbon);

        $setting = app(ReadableService::class)
            ->getSetting($user, 'val');

        $this->assertNotNull($setting);
        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals($setting->key, 'val');
        $this->assertEquals($setting->cast, 'datetime');
        $this->assertInstanceOf(Carbon::class, $setting->value);
        $this->assertEquals($carbon->toString(), $setting->value->toString());
        $this->assertInstanceOf(User::class, $setting->model);
        $this->assertEquals($user->id, $setting->model_id);

        // cleanup
        $this->assertTrue(app(SettingService::class)->delete($user, 'val'));
        $this->assertNull($user->getSetting('val'));

        $this->assertFalse(app(SettingService::class)->delete($user, 'val'));
    }

}
