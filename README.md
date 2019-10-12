[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bavix/laravel-settings/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-settings/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/bavix/laravel-settings/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-settings/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bavix/laravel-settings/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bavix/laravel-settings/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/bavix/laravel-settings/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Mutation testing badge](https://badge.stryker-mutator.io/github.com/bavix/laravel-settings/master)](https://packagist.org/packages/bavix/laravel-settings)

[![Package Rank](https://phppackages.org/p/bavix/laravel-settings/badge/rank.svg)](https://packagist.org/packages/bavix/laravel-settings)
[![Latest Stable Version](https://poser.pugx.org/bavix/laravel-settings/v/stable)](https://packagist.org/packages/bavix/laravel-settings)
[![Latest Unstable Version](https://poser.pugx.org/bavix/laravel-settings/v/unstable)](https://packagist.org/packages/bavix/laravel-settings)
[![License](https://poser.pugx.org/bavix/laravel-settings/license)](https://packagist.org/packages/bavix/laravel-settings)
[![composer.lock](https://poser.pugx.org/bavix/laravel-settings/composerlock)](https://packagist.org/packages/bavix/laravel-settings)

laravel-settings - Keep user settings easy.

* **Vendor**: bavix
* **Package**: laravel-settings
* **Version**: [![Latest Stable Version](https://poser.pugx.org/bavix/laravel-settings/v/stable)](https://packagist.org/packages/bavix/laravel-settings)
* **PHP Version**: 7.2+ 
* **Laravel Version**: `5.5`, `5.6`, `5.7`, `5.8`, `6.0`
* **[Composer](https://getcomposer.org/):** `composer require bavix/laravel-settings`

### Usage
Add the `HasSettings`, `HasSetSettings`, `HasGetSettings` trait and `Settingable` interface to model.
```php
use Bavix\Settings\Traits\HasSettings;
use Bavix\Settings\Traits\HasSetSettings;
use Bavix\Settings\Traits\HasGetSettings;
use Bavix\Settings\Interfaces\Settingable;

class User extends Model implements Settingable
{
    use HasGetSettings, HasSetSettings, HasSettings;
}
```

Checking user settings.

```php
$user = User::first();
$user->getSetting('notify'); // null
$user->getSettingBool('notify'); // null
$user->getSettingBool('notify', false); // bool(false)
```

Let's save the settings.

```php
(bool)$user->setSettingBool('notify', false); // bool(true)
$user->getSettingBool('notify', false); // bool(true)
```

---
Supported by

[![Supported by JetBrains](https://cdn.rawgit.com/bavix/development-through/46475b4b/jetbrains.svg)](https://www.jetbrains.com/)
