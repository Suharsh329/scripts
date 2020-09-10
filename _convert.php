<?php
function convert_currency(string $from_currency, string $to_currency): string
{
    $api_key = '';

    $from_Currency = urlencode($from_currency);

    $to_Currency = urlencode($to_currency);

    $query =  "{$from_Currency}_{$to_Currency}";

    $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$api_key}");

    $obj = json_decode($json, true);

    $val = floatval($obj["$query"]);

    return number_format($val, 2, '.', '');
}

$from = $argv[1];

$to = $argv[2];

echo "1 $from = " . convert_currency($from, $to) . " $to\n";
