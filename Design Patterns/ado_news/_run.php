<?php

include_once 'Application.php';

try{
    $application = new Application();
    $application->run();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
