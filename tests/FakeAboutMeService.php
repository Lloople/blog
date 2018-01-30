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

    public function getHtml()
    {
        return $this->content;
    }

    public function hasContent()
    {
        return $this->content != '';
    }

    public function getContent()
    {
        return 'Lorem Ipsum';
    }
}
