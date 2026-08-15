<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function show($slug)
    {
        $projects = collect(config('portfolio.projects'));
        $project = $projects->firstWhere('slug', $slug);
        abort_unless($project, 404);

        return view('project', [
            'profile' => config('portfolio.profile'),
            'project' => $project,
            'others' => $projects->where('slug', '!=', $slug)->values(),
        ]);
    }
}
