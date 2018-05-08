<?php

include_once "News.php";

class StandardNews extends News
{
    /**
     * Get date override for standard news
     * @return String
     */
    public function getDate()
    {
        return date(DateTime::ISO8601, strtotime(parent::getDate()) + (24*60*60));
    }
}