<?php

namespace Bavix\Settings\Test;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Services\ReadableService;
use Bavix\Settings\Services\SettingService;
use Bavix\Settings\Test\Models\User;
use Carbon\Carbon;

class ModelWritableTest extends TestCase
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

    /**
     * @return void
     */
    public function testSettingInt(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $user->setSettingInt('val', 123);

        $setting = app(ReadableService::class)
            ->getSettingInt($user, 'val');

        $this->assertIsInt($setting);
        $this->assertEquals(123, $setting);
    }

    /**
     * @return void
     */
    public function testSettingFloat(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $user->setSettingFloat('val', 123.12);

        $setting = app(ReadableService::class)
            ->getSettingFloat($user, 'val');

        $this->assertIsFloat($setting);
        $this->assertEquals(123.12, $setting);
    }

    /**
     * @return void
     */
    public function testSettingBool(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $user->setSettingBool('val', false);

        $setting = app(ReadableService::class)
            ->getSettingBool($user, 'val');

        $this->assertFalse($setting);

        $setting = app(ReadableService::class)
            ->getSettingBool($user, 'nullable');

        $this->assertNull($setting);
    }

    /**
     * @return void
     */
    public function testSettingString(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $user->setSettingString('val', 'hello world');

        $setting = app(ReadableService::class)
            ->getSettingString($user, 'val');

        $this->assertEquals('hello world', $setting);
    }

    /**
     * @return void
     */
    public function testSettingArray(): void
    {
        $data = ['hello' => 'world'];

        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $user->setSettingArray('val', $data);

        $setting = app(ReadableService::class)
            ->getSettingArray($user, 'val');

        $this->assertIsArray($setting);
        $this->assertEqualsCanonicalizing($data, $setting);
    }

}
