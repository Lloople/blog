<?php

namespace App\Interfaces;

interface AboutMeServiceInterface
{

    function getHtml();

    function hasContent();

    function getContent();
}