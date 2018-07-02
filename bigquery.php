<?php

namespace Google\Cloud\Samples\BigQuery;
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\BigQuery\BigQueryClient;

$projectId = 'salebigdata';
$result = run_query($projectId, $query, true);

function run_query($projectId, $query, $useLegacySql)
 {
     $bigQuery = new BigQueryClient([
         'projectId' => $projectId,
     ]);
     $jobConfig = $bigQuery->query($query)->useLegacySql($useLegacySql);
     $queryResults = $bigQuery->runQuery($jobConfig);
     return $queryResults;
     /*$i = 0;
     foreach ($queryResults as $row) {
         printf('--- Row %s ---' . PHP_EOL, ++$i);
         foreach ($row as $column => $value) {
             printf('%s: %s' . PHP_EOL, $column, json_encode($value));
             echo "<br/>";
         }
     }
     printf('Found %s row(s)' . PHP_EOL, $i);*/
 }

    ?>