<?php declare(strict_types = 1);

namespace Contributte\Phpunit\Extension;

use Contributte\Tester\Utils\FileSystem;
use PHPUnit\Event\TestRunner\Finished;
use PHPUnit\Event\TestRunner\FinishedSubscriber;
use PHPUnit\Runner\Extension\Extension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

final class CleanerExtension implements Extension
{

	public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void
	{
		if (!$parameters->has('dirs')) {
			return;
		}

		$dirs = $parameters->get('dirs');
		if (strlen($dirs) <= 0) {
			return;
		}

		$dirs = explode(',', $parameters->get('dirs'));

		$facade->registerSubscriber(new class ($dirs) implements FinishedSubscriber {

			/**
			 * @param string[] $dirs
			 */
			public function __construct(private array $dirs)
			{
			}

			public function notify(Finished $event): void
			{
				foreach ($this->dirs as $dir) {
					FileSystem::purge($dir);
				}
			}

		});
	}

}
