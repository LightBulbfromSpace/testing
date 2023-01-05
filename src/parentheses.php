<?php

/** @throws Exception for empty input
 *  @param string $input
 *  @return bool
 */



function areParenthesesValid(string $input) : bool
{
	$parentheses = [
		')' => '(',
		']' => '[',
		'}' => '{',
		'>' => '<',
	];

	if ($input === '')
	{
		throw new Exception('input is empty');
	}

	$stack = new SplStack();
	$inputArr = mb_str_split($input, 1, 'ASCII');

	foreach ($inputArr as $char)
	{
		if (in_array($char, $parentheses, true))
		{
			$stack->push($char);
		}
		if (isset($parentheses[$char]))
		{
			if ($stack->isEmpty())
			{
				return false;
			}
			if ($parentheses[$char] === $stack->top())
			{
				$stack->pop();
			}
		}
	}
	return $stack->isEmpty();
}