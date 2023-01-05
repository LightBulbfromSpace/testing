<?php

use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
	public function testSumWorksCorrectly() : void
	{
		$this->assertEquals(3, sum(1, 2));
	}

	/**
	 * @return void
	 * @dataProvider zeroProvider
	 */
	public function testSumWorksCorrectlyWithZeros($expected, $a, $b) : void
	{
		$this->assertEquals($expected, sum($a, $b));
	}
	public function zeroProvider() : array
	{
		return [
			[0, 0, 0],
			[2, 0, 2],
			[-1, -1, 0],
		];
	}
}
