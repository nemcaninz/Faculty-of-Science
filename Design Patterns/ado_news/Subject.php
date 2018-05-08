<?php

include_once "Observer.php";

interface Subject
{
    function attach(Observer $observer);
    function detach(Observer $observer);
    function notify();
}