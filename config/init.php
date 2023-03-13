<?php 

require_once 'config.php';

// AutoLoad all classes at once

function autoload($class_name)
{
	require_once 'lib/' . $class_name . '.php';
}

spl_autoload_register('autoload');

// Other