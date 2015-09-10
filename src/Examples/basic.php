<?php
require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../XParser.php';

$user_agent = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36";
use Jdecano\XParser;
//////// Lets GO!!!
$parser = new XParser($user_agent);
echo '<pre>';
print_r($parser->engine());