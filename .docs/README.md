# Contributte Phpunit

## Installation

```bash
composer require --dev contributte/phpunit
```

## Usage

## Extensions

### CleanerExtension

This extesions clean your defined folders.

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

This extension uses `nette/tester` and its `Environment::bypassFinals()`. It allows you mock final classes and methods. [Read more in docs.](https://tester.nette.org/en/helpers#toc-environment-bypassfinals)

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
---------------

Thanks for testing, reporting and contributing.
