<?php

test('sum function test', static function(){
	$cases = [
		[
			'a' => 1,
			'b' => 2,
			'expected' => 3,
		],
		[
			'a' => 0,
			'b' => 1,
			'expected' => 1,
		]
	];
	foreach ($cases as $case)
	{
		assertEquals(sum($case['a'], $case['b']), $case['expected']);
	}
});