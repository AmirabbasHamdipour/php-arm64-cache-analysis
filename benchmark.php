<?php
// benchmark.php - Compare property access performance on ARM64 vs x86_64

function runTest(int $iterations = 1000000): float {
    $objects = [];
    for ($i = 0; $i < $iterations; $i++) {
        $obj = new stdClass();
        $obj->a = $i;
        $obj->b = $i + 1;
        $objects[] = $obj;
    }

    $start = hrtime(true);
    $sum = 0;
    foreach ($objects as $obj) {
        $sum += $obj->a + $obj->b;
    }
    $end = hrtime(true);

    return ($end - $start) / 1e6; // milliseconds
}

$results = [];
for ($i = 0; $i < 10; $i++) {
    $results[] = runTest();
}
$avg = array_sum($results) / count($results);
echo "Average time: " . round($avg, 2) . " ms\n";
echo "Platform: " . php_uname('m') . "\n";
