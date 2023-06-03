<?php declare(strict_types = 1);

namespace Contributte\Phpunit\Extension;

use PHPUnit\Event\TestRunner\Configured;
use PHPUnit\Event\TestRunner\ConfiguredSubscriber;
use PHPUnit\Runner\Extension\Extension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;
use Tester\Environment;

final class BypassFinalExtension implements Extension
{

	public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void
	{
		$facade->registerSubscriber(new class implements ConfiguredSubscriber {

			public function notify(Configured $event): void
			{
				Environment::bypassFinals();
			}

		});
	}

}
