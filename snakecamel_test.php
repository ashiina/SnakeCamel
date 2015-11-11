<?

require_once('SnakeCamel.php');

$json_str = file_get_contents($argv[1]);
$input = json_decode($json_str, true);
if ( ! $input) {
	echo "Couldn't parse json.\n";
	exit;
}

$SC = new SnakeCamel;

$start_time = microtime();
$start_mem = memory_get_usage();
$r = $SC->snake_to_camel($input);
$end_mem = memory_get_usage();
$end_time = microtime();



var_dump($r);
echo "======REPORT======\n";
echo "input JSON size:".strlen($json_str)." bytes\n";
echo "total key size:".$SC->total_key_size." bytes\n";
echo "array memory usage(estimate):".($end_mem - $start_mem) / (1024)." KB\n";
echo (($end_time - $start_time)) . " sec\n";


