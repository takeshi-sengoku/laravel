<?php

if (!function_exists('error'))
{
	function error ($errors, $key) {
		return $errors->has($key) ? ' error' : '';
	}
}
