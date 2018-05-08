<?php

include_once "Subject.php";

interface Observer
{
    function update(Subject $subject);
}