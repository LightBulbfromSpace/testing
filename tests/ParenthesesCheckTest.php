<?php

use PHPUnit\Framework\TestCase;

class ParenthesesCheckTest extends TestCase
{
	public function testThrowsExceptionForEmptyInput() : void
	{
		$this->expectException(Exception::class);
		$this->expectExceptionMessage('input is empty');
		areParenthesesValid('');
	}

	/**
	 * @dataProvider casesProvider
	 */
	public function testParenthesesAreValid($str, $isValid) : void
	{
		$this->assertEquals($isValid, areParenthesesValid($str));
	}

	public function casesProvider() : array
	{
		return [
			['te[s]t', true],
			['te)s)t', false],
			['te(s(t', false],
			['te)s(t', false],
			['te(s)t', true],
			['t<e>st', true],
			['{test}', true],
			['te[s)t', false],
			['<t{es>}t', false],
			['t<<e)st', false],
		];
	}
}
