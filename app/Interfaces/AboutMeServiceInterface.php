<?php

namespace App\Interfaces;

interface AboutMeServiceInterface
{
    public function getHtml();

    public function hasContent();

    public function getContent();
}
