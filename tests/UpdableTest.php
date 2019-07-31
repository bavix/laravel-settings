<?php

namespace Bavix\Settings\Test;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Services\ReadableService;
use Bavix\Settings\Services\WritableService;
use Bavix\Settings\Test\Models\User;

class UpdableTest extends TestCase
{

    /**
     * @return void
     */
    public function testSetting(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        // create
        app(WritableService::class)
            ->setSettingInt($user, 'val', 12333);

        $setting = app(ReadableService::class)
            ->getSetting($user, 'val');

        $this->assertNotNull($setting);
        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals($setting->key, 'val');
        $this->assertEquals($setting->cast, 'int');
        $this->assertIsInt($setting->value);
        $this->assertEquals(12333, $setting->value);
        $this->assertInstanceOf(User::class, $setting->model);
        $this->assertEquals($user->id, $setting->model_id);

        // update
        app(WritableService::class)
            ->setSettingInt($user, 'val', 123);

        $setting = app(ReadableService::class)
            ->getSetting($user, 'val');

        $this->assertNotNull($setting);
        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals($setting->key, 'val');
        $this->assertEquals($setting->cast, 'int');
        $this->assertIsInt($setting->value);
        $this->assertEquals(123, $setting->value);
        $this->assertInstanceOf(User::class, $setting->model);
        $this->assertEquals($user->id, $setting->model_id);
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
        // create
        app(WritableService::class)
            ->setSettingInt($user, 'val', 0x11);

        $setting = app(ReadableService::class)
            ->getSettingInt($user, 'val');

        $this->assertIsInt($setting);
        $this->assertEquals(0x11, $setting);

        // update
        app(WritableService::class)
            ->setSettingInt($user, 'val', 123);

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
        // create
        app(WritableService::class)
            ->setSettingFloat($user, 'val', 123);

        $setting = app(ReadableService::class)
            ->getSettingFloat($user, 'val');

        $this->assertIsFloat($setting);
        $this->assertEquals(123, $setting);

        // update
        app(WritableService::class)
            ->setSettingFloat($user, 'val', 123.12);

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
        // create
        app(WritableService::class)
            ->setSettingBool($user, 'val', true);

        $setting = app(ReadableService::class)
            ->getSettingBool($user, 'val');

        $this->assertTrue($setting);

        // update
        app(WritableService::class)
            ->setSettingBool($user, 'val', false);

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
        // create
        app(WritableService::class)
            ->setSettingString($user, 'val', 'good bay, world!');

        $setting = app(ReadableService::class)
            ->getSettingString($user, 'val');

        $this->assertEquals('good bay, world!', $setting);

        // update
        app(WritableService::class)
            ->setSettingString($user, 'val', 'hello world');

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
        // create
        app(WritableService::class)
            ->setSettingArray($user, 'val', [$data]);

        $setting = app(ReadableService::class)
            ->getSettingArray($user, 'val');

        $this->assertIsArray($setting);
        $this->assertEqualsCanonicalizing([$data], $setting);

        // update
        app(WritableService::class)
            ->setSettingArray($user, 'val', $data);

        $setting = app(ReadableService::class)
            ->getSettingArray($user, 'val');

        $this->assertIsArray($setting);
        $this->assertEqualsCanonicalizing($data, $setting);
    }

}
