<?php

namespace Tests;

use App\Interfaces\AboutMeServiceInterface;

class FakeAboutMeService implements AboutMeServiceInterface
{

    protected $content;

    public function __construct($content = null)
    {
        $this->content = $content ?? $this->getContent($content);
    }
    function getHtml()
    {
        return $this->content;
    }

    function hasContent()
    {
        return $this->content != '';
    }

    function getContent()
    {
        return 'Lorem Ipsum';
    }
}