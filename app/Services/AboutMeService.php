<?php

namespace App\Services;

class AboutMeService
{

    public function getHtml()
    {
        return (new \Parsedown())->text($this->getText());
    }

    public function getText()
    {
        return @file_get_contents(resource_path('about_me.md'));
    }


}