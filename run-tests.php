<?php

require_once __DIR__ . '/boot.php';

class AssertionException extends RuntimeException
{
	protected $actual;
	protected $expected;

	public function __construct($actual, $expected, $message = "", $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);

		$this->actual = $actual;
		$this->expected = $expected;
	}

	public function getActual()
	{
		return $this->actual;
	}

	public function getExpected()
	{
		return $this->expected;
	}


}

function assertEquals($expected, $actual)
{
	if ($actual !== $expected)
	{
		throw new AssertionException($actual, $expected);
	}
}

function test(string $title, Closure $body)
{

	try
	{
		$body();
		echo '[PASS] ' . $title . PHP_EOL;
	}
	catch (AssertionException $e)
	{
		$expected = $e->getExpected();
		$actual = $e->getActual();
		echo '[FAIL] ' . $title . PHP_EOL;
		echo "Expected: (" . gettype($expected) . ") " . $expected
			. PHP_EOL . "Got: (" . gettype($actual) . ") " . $actual . PHP_EOL;
	}
}

$testFiles = new DirectoryIterator(ROOT . '/tests');
foreach ($testFiles as $file)
{
	if ($file->isDot())
	{
		continue;
	}
	if (preg_match('/\.php$/', $file->getFilename()))
	{
		require_once ROOT . '\\tests\\' . $file->getFilename();
	}

}