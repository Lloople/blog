<?php

namespace App\Http\Controllers;

use App\Interfaces\AboutMeServiceInterface;

class AboutMeController extends Controller
{
    public function __construct(AboutMeServiceInterface $aboutMe)
    {
        $this->aboutMe = $aboutMe;
    }

    public function show()
    {
        if (! $this->aboutMe->hasContent()) {
            abort(404);
        }

        $data = [
            'information' => $this->aboutMe->getHtml(),
        ];

        return view('frontend.about-me', $data);
    }
}
