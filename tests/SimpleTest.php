<?php

namespace Bavix\Settings\Test;

use Bavix\Settings\Models\Setting;
use Bavix\Settings\Test\Models\User;

class SimpleTest extends TestCase
{

    /**
     * @return void
     */
    public function testString(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $setting = $user->settings()->create([
            'key' => 'color',
            'cast' => 'string',
            'value' => '#fdf400',
        ]);

        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals($setting->key, 'color');
        $this->assertEquals($setting->cast, 'string');
        $this->assertEquals($setting->value, '#fdf400');
    }

    /**
     * @return void
     */
    public function testInt(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $setting = $user->settings()->create([
            'key' => 'counter',
            'cast' => 'int',
            'value' => '42',
        ]);

        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals($setting->key, 'counter');
        $this->assertEquals($setting->cast, 'int');
        $this->assertEquals($setting->value, 42);
    }

    /**
     * @return void
     */
    public function testBool(): void
    {
        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $setting = $user->settings()->create([
            'key' => 'enabled',
            'cast' => 'bool',
            'value' => '1',
        ]);

        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals($setting->key, 'enabled');
        $this->assertEquals($setting->cast, 'bool');
        $this->assertEquals($setting->value, true);
    }

    /**
     * @return void
     */
    public function testArray(): void
    {
        $array = [
            1,
            2,
            3,
            'key' => 'value',
            'h' => [4, 2, 1]
        ];

        /**
         * @var User $user
         */
        $user = factory(User::class)->create();
        $setting = $user->settings()->create([
            'key' => 'json',
            'cast' => 'array',
            'value' => $array,
        ]);

        $this->assertInstanceOf(Setting::class, $setting);
        $this->assertEquals($setting->key, 'json');
        $this->assertEquals($setting->cast, 'array');
        $this->assertIsArray($setting->value);
        $this->assertEqualsCanonicalizing($array, $setting->value);
    }

}
