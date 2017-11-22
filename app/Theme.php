<?php

namespace App;

class Theme
{

    public function getMainColor()
    {
        return config('blog.theme.color_main');
    }

    public function getColor()
    {
        return config('blog.theme.color');
    }

    public function getHighlightColor()
    {
        return config('blog.theme.color_highlight');
    }

    public function getHighlightColorText()
    {
        return config('blog.theme.color_highlight_text');
    }

}