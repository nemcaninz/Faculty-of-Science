<?php

include_once "News.php";

class UrgentNews extends News
{
    /**
     * Get title override for urgent news
     * @return String
     */
    public function getTitle()
    {
        return strtoupper(parent::getTitle());
    }
}