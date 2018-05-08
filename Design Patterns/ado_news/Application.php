<?php

include_once "User.php";
include_once "UrgentNews.php";
include_once "StandardNews.php";

class Application
{
    private $users = [];
    private $news = [];

    public function run()
    {
        $this->printAppTitle();

        $this->createUsers();
        $this->createNews();
        $this->registerAndPublish();

        exit(0);
    }

    /**
     * Create new user
     */
    private function createUsers()
    {
        $this->users[] = new User('john@doe.com');
        $this->users[] = new User('jane@doe.com');
        $this->users[] = new User('asd@asd.com');
    }

    /**
     * Create news
     */
    private function createNews()
    {
        $this->news[] = new UrgentNews(
            "Breaking news",
            date(DateTime::ISO8601, time()),
            "This is urgent news content"
        );
        $this->news[] = new StandardNews(
            "Boring news",
            date(DateTime::ISO8601, time()),
            "This is boring news content"
        );
    }

    /**
     * Register observers and publish news
     */
    private function registerAndPublish()
    {
        foreach ($this->news as $news) {
            $news->attach($this->users[rand(0,2)]);
            $news->attach($this->users[rand(0,2)]);
            $news->publish();
        }
    }

    /**
     * Print application name
     */
    private function printAppTitle()
    {
        echo "========================================\r\n";
        echo 'Running ' . strtoupper(basename(__DIR__))  . "\r\n";
        echo "========================================\r\n";
    }
}