<?php

namespace Bavix\Settings\Test;

use Bavix\Settings\SettingsServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Application;

class TestCase extends OrchestraTestCase
{

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'testbench'])->run();
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [SettingsServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        // database
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

}
