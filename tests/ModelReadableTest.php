<?php

namespace Bavix\Settings\Test;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Services\ReadableService;
use Bavix\Settings\Test\Models\User;

class ModelReadableTest extends TestCase
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
        $user->settings()->create([
            'key' => 'val',
            'cast' => 'int',
            'value' => 123,
        ]);

        $setting = $user->getSetting('val');

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
        $user->settings()->create([
            'key' => 'val',
            'cast' => 'int',
            'value' => 123,
        ]);

        $setting = $user->getSettingInt('val');

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
        $user->settings()->create([
            'key' => 'val',
            'cast' => 'float',
            'value' => 123.12,
        ]);

        $setting = $user->getSettingFloat('val');

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
        $user->settings()->create([
            'key' => 'val',
            'cast' => 'bool',
            'value' => false,
        ]);

        $setting = $user->getSettingBool('val');

        $this->assertFalse($setting);

        $setting = $user->getSettingBool('nullable');

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
        $user->settings()->create([
            'key' => 'val',
            'cast' => 'string',
            'value' => 'hello world',
        ]);

        $setting = $user->getSettingString('val');

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
        $user->settings()->create([
            'key' => 'val',
            'cast' => 'json',
            'value' => $data,
        ]);

        $setting = $user->getSettingArray('val');

        $this->assertIsArray($setting);
        $this->assertEqualsCanonicalizing($data, $setting);
    }

}
