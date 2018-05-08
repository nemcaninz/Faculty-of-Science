<?php

include_once "Observer.php";

class User implements Observer
{
    private $email;

    /**
     * User constructor.
     * @param $email
     */
    function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Update user with the subject (news)
     * @param Subject $news
     */
    public function update(Subject $news)
    {
        $this->sendEmail($news);
    }

    /**
     * Send email for news
     * @param Subject $news
     */
    public function sendEmail(Subject $news)
    {
        echo "Sending email to " . $this->email . " for article: " . $news->getTitle() . "\r\n";
    }
}