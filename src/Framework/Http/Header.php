<?php


namespace Framework\Http;


class Header
{
    public function set($header)
    {
        header($header);
    }
}