<?php


namespace Framework\Http;


class Response
{
    public $content;
    public $headers;

    public function __construct()
    {
        $this->headers = new Header();
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    public function send()
    {
        return $this->getContent();
    }

}