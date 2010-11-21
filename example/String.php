<?php
namespace pl\tomaszrup;

require_once '../String.class.php';

function s_test(StringType $s) {
    $s = $s->concat('   ala')->concat(' ')->concat('ma kota   ')->trim();
    $s->println();
    echo $s->length().PHP_EOL;
    $s[1]='qq';
    $s->println();
    unset($s[11]);
    $s->println();
    foreach($s as $idx=>$char) {
        $char->println();
    }
	echo ($s->lt($s) ? '<' : '>=').PHP_EOL;
	echo ($s->lt(new String('awa')) ? '<' : '>=').PHP_EOL;
}
s_test(new String());
