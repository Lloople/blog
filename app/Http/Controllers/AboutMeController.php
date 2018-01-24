<?php

namespace App\Http\Controllers;


class AboutMeController extends Controller
{
    public function show()
    {
        $data = [
            'information' => 'Lorem ipsum dolor sit amet'
        ];

        return view('frontend.about-me', $data);
    }
}
