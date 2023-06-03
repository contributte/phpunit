<?php declare(strict_types = 1);

namespace Contributte\Phpunit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class AbstractTestCase extends PHPUnitTestCase
{

	/**
	 * @param mixed[] $expected
	 * @param mixed[] $actual
	 */
	public static function assertEqualsArrays(array $expected, array $actual, string $message = ''): void
	{
		sort($expected);
		sort($actual);

		self::assertEquals($expected, $actual, $message);
	}

	public static function assertEqualsSpaceless(string $expected, string $actual, string $message = ''): void
	{
		self::assertEquals(trim($expected), $actual, $message);
	}

	public static function markTestComplete(): void
	{
		self::assertTrue(true);
	}

}
