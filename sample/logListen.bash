#!/bin/bash
#will start log listener and send output to log file
php logListener.php >> logs_from_rabbit.log

echo "log listener activated";
