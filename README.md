![](https://heatbadger.now.sh/github/readme/contributte/phpunit/)

<p align=center>
	<a href="https://github.com/contributte/phpunit/actions"><img src="https://badgen.net/github/checks/contributte/phpunit/master?cache=300"></a>
	<a href="https://coveralls.io/r/contributte/phpunit"><img src="https://badgen.net/coveralls/c/github/contributte/phpunit?cache=300"></a>
	<a href="https://packagist.org/packages/contributte/phpunit"><img src="https://badgen.net/packagist/dm/contributte/phpunit"></a>
	<a href="https://packagist.org/packages/contributte/phpunit"><img src="https://badgen.net/packagist/v/contributte/phpunit"></a>
</p>
<p align=center>
	<a href="https://packagist.org/packages/contributte/phpunit"><img src="https://badgen.net/packagist/php/contributte/phpunit"></a>
	<a href="https://github.com/contributte/phpunit"><img src="https://badgen.net/github/license/contributte/phpunit"></a>
	<a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
	<a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
	<a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

PHPUnit helpers and extensions for Contributte projects, including test cleanup and final class bypass support.

## Versions

| State       | Version | Branch   | Nette | PHP     |
|-------------|---------|----------|------|---------|
| dev         | `^0.4` | `master` | 3.3+ | `>=8.2` |
| stable      | `^0.4` | `master` | 3.3+ | `>=8.2` |

## Installation

To install latest version of `contributte/phpunit` use [Composer](https://getcomposer.org).

```bash
composer require --dev contributte/phpunit
```

## Usage

Register the PHPUnit extensions you need in your `phpunit.xml` configuration.

## Extensions

### CleanerExtension

This extension cleans your defined folders.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit>
    <!-- your configuration -->
    <extensions>
      <bootstrap class="Contributte\Phpunit\Extension\CleanerExtension">
        <parameter name="dirs" value="tests/tmp"/>
      </bootstrap>
    </extensions>
</phpunit>
```

### BypassFinalExtension

This extension uses `nette/tester` and its `Environment::bypassFinals()`. It allows you to mock final classes and methods. [Read more in docs.](https://tester.nette.org/en/helpers#toc-environment-bypassfinals)

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit>
    <!-- your configuration -->
    <extensions>
        <bootstrap class="Contributte\Phpunit\Extension\BypassFinalExtension"/>
    </extensions>
</phpunit>
```

## Example

Full example of `phpunit.xml`.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceSchemaLocation="vendor/phpunit/phpunit/phpunit.xsd"
	backupGlobals="false"
	beStrictAboutTestsThatDoNotTestAnything="true"
	beStrictAboutOutputDuringTests="true"
	colors="true"
	failOnRisky="true"
	failOnWarning="true"
	processIsolation="false"
	stopOnError="false"
	stopOnFailure="false"
	cacheResult="true"
	cacheResultFile="var/tmp/.phpunit.result.cache"
	bootstrap="tests/bootstrap.php"
>
	<php>
		<ini name="memory_limit" value="1048M"/>
		<ini name="date.timezone" value="Europe/Prague"/>
	</php>
	<testsuites>
		<testsuite name="App.Build">
			<directory>./tests/Cases/Build</directory>
		</testsuite>
		<testsuite name="App.E2E">
			<directory>./tests/Cases/E2E</directory>
		</testsuite>
		<testsuite name="App.Unit">
			<directory>./tests/Cases/Unit</directory>
		</testsuite>
	</testsuites>
	<extensions>
		<bootstrap class="Contributte\Phpunit\Extension\CleanerExtension">
			<parameter name="dirs" value=""/>
		</bootstrap>
		<bootstrap class="Contributte\Phpunit\Extension\BypassFinalExtension"/>
	</extensions>
</phpunit>
```

Thanks for testing, reporting and contributing.

## Development

See [how to contribute](https://contributte.org) to this package. This package is currently maintained by these authors.

<a href="https://github.com/f3l1x">
	<img width="80" height="80" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=80">
</a>

-----

Consider to [support](https://contributte.org/partners) **contributte** development team.
Also thank you for using this package.
