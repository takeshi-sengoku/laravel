<?php

class Test {
	public static function Foo () {
	}

	protected static function Baa () {
	}

	public function hoge () {
	}

	private function huga () {
	}
}

Test::Foo();

$test = new Test;
$test->hoge();
