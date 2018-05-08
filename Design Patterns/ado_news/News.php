<?php

include_once "Subject.php";

class News implements Subject
{
    /**
     * @var array
     */
    private $observers = [];
    private $title;
    private $date;
    private $content;

    /**
     * News constructor.
     * @param String $title
     * @param String $date
     * @param String $content
     */
    public function __construct($title, $date, $content)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
    }

    /**
     * Attach observer
     * @param Observer $observer
     */
    public function attach(Observer $observer)
    {
        if (!in_array($observer, $this->observers)) {
            $this->observers[] = $observer;
        }
    }

    /**
     * Detach observer
     * @param Observer $observer
     */
    public function detach(Observer $observer)
    {
        foreach ($this->observers as $key => $value) {
            if ($value == $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    /**
     * Notify all observers
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }

    /**
     * Publish news
     */
    public function publish()
    {
        echo "\r\nPublishing ...\r\n";
        $this->printTitle();
        $this->printDate();
        $this->printContent();

        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Get news title
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get news publish date
     * @return String
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get news content
     * @return String
     */
    public   function getContent()
    {
        return $this->content;
    }

    /**
     * Print title
     */
    private function printTitle()
    {
        echo $this->getTitle() . "\r\n";;
    }

    /**
     * Print date
     */
    private function printDate()
    {
        echo $this->getDate() . "\r\n";;
    }

    /**
     * Print content
     */
    private function printContent()
    {
        echo $this->getContent() . "\r\n";
    }
}