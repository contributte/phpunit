<?php declare(strict_types = 1);

namespace Tests\Cases;

use Contributte\Tester\Toolkit;
use Mockery;
use Tester\Assert;
use Tester\Environment;
use Tests\Mocks\FinalClass;
use Tests\Mocks\FinalService;

require_once __DIR__ . '/../bootstrap.php';

Toolkit::test(function () {
	Environment::bypassFinals();

	$mock = Mockery::mock(FinalClass::class);
	$mock->shouldReceive('id')
		->andReturn('fake');

	$service = new FinalService();

	Assert::equal('fake', $service->hello($mock));
});
