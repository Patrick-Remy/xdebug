--TEST--
Test for bug #535: Code coverage and return before function|class ending (>= PHP 7.4)
--SKIPIF--
<?php
require 'tests/utils.inc';
check_reqs('PHP >= 7.4');
?>
--INI--
xdebug.overload_var_dump=0
--FILE--
<?php
xdebug_start_code_coverage();

class test
{
    function a() {
        return true;
    }
}

$a = new test();
$a->a();

var_dump(xdebug_get_code_coverage());
?>
--EXPECTF--
array(1) {
  ["%sbug00535-php74.php"]=>
  array(4) {
    [7]=>
    int(1)
    [11]=>
    int(1)
    [12]=>
    int(1)
    [14]=>
    int(1)
  }
}

