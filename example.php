<?php

require_once 'vendor/autoload.php';

use MuninPlugin\Graph;
use MuninPlugin\Datasource;

$graph = (new Graph('MyGraph'))
    ->setVLabel('My Vlabel')
    ->setCategory('My Category');


$datasource = (new Datasource('mydata'))
    ->setLabel('My Data')
    ->setValue('foo');


$graph->getDatasourceSet()->append($datasource);


echo 'Config:'.PHP_EOL;
echo $graph->getConfig().PHP_EOL;
echo PHP_EOL;
echo 'Values:'.PHP_EOL;
echo $graph->getDatasourceSet()->getValues().PHP_EOL;
