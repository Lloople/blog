<?php

namespace App\Services;

use App\Interfaces\AboutMeServiceInterface;

class AboutMeService implements AboutMeServiceInterface
{

    /** @var string  */
    protected $content = '';

    public function __construct()
    {
        $this->content = $this->getContent();
    }

    /**
     * Check if there's content to show.
     *
     * @return bool
     */
    public function hasContent()
    {
        return $this->content != '';
    }

    /**
     * Get the content parsed into html.
     *
     * @return string
     */
    public function getHtml()
    {
        return (new \Parsedown())->text($this->content);
    }

    /**
     * Get the text from the specified resource.
     *
     * @return bool|string
     */
    public function getContent()
    {
        return @file_get_contents(resource_path('about_me.md'));
    }

}