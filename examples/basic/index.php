<?php
require '../../BackgroundProcess.php';

//Please don't use "true" argument in a production, This will fill your storage if you not clean all the logs.
$proc = new BackgroundProcess('php ./process.php', true);

$pid = $proc->getProcessId();

echo $proc->get_log_paths();

echo "Process id: " . $pid . "\n";
