<?php declare(strict_types = 1);

namespace Tests\Mocks;

final class FinalService
{

	public function hello(FinalClass $class): string
	{
		return $class->id();
	}

}
