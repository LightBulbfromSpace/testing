<?php

use PHPUnit\Framework\TestCase;

class DivTest extends TestCase
{
	public function testBasicDivision(): void
	{
		$this->assertEquals(2, div(4, 2));
	}
	public function testDivisionByZero(): void
	{
		$this->expectError(DivisionByZeroError::class);
		div(2/1);
	}
}
