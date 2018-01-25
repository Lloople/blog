<?php

namespace App\Http\Controllers;


use App\Services\AboutMeService;

class AboutMeController extends Controller
{
    public function __construct(AboutMeService $aboutMe)
    {
        $this->aboutMe = $aboutMe;
    }

    public function show()
    {
        $data = [
            'information' => $this->aboutMe->getHtml()
        ];

        return view('frontend.about-me', $data);
    }
}
