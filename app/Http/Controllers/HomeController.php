<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $portfolio = config('portfolio');

        return view('home', [
            'profile' => $portfolio['profile'],
            'projects' => $portfolio['projects'],
            'skills' => $portfolio['skills'],
            'soft' => $portfolio['soft'],
            'experience' => $portfolio['experience'],
            'education' => $portfolio['education'],
            'certifications' => $portfolio['certifications'],
        ]);
    }
}
