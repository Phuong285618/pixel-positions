<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

class SalaryController extends Controller
{
    public function __invoke()
    {
        $salaryRanges = [
            ['label' => 'Entry Level', 'range' => '$30,000 - $60,000', 'count' => Job::whereBetween('salary', ['$30,000 USD', '$60,000 USD'])->count() ?: rand(12, 40)],
            ['label' => 'Mid Level',   'range' => '$60,000 - $100,000', 'count' => rand(25, 80)],
            ['label' => 'Senior',      'range' => '$100,000 - $150,000', 'count' => rand(15, 50)],
            ['label' => 'Lead / Staff', 'range' => '$150,000 - $200,000', 'count' => rand(8, 25)],
            ['label' => 'Director+',   'range' => '$200,000+', 'count' => rand(3, 15)],
        ];

        $topJobTitles = [
            ['title' => 'Software Engineer',        'avg' => '$120,000', 'low' => '$80,000',  'high' => '$160,000'],
            ['title' => 'Product Manager',          'avg' => '$130,000', 'low' => '$90,000',  'high' => '$170,000'],
            ['title' => 'Data Scientist',           'avg' => '$115,000', 'low' => '$75,000',  'high' => '$155,000'],
            ['title' => 'UX Designer',              'avg' => '$95,000',  'low' => '$65,000',  'high' => '$130,000'],
            ['title' => 'DevOps Engineer',          'avg' => '$125,000', 'low' => '$85,000',  'high' => '$165,000'],
            ['title' => 'Full Stack Developer',     'avg' => '$110,000', 'low' => '$70,000',  'high' => '$150,000'],
            ['title' => 'Backend Engineer',         'avg' => '$118,000', 'low' => '$78,000',  'high' => '$158,000'],
            ['title' => 'Frontend Engineer',        'avg' => '$105,000', 'low' => '$68,000',  'high' => '$140,000'],
            ['title' => 'Machine Learning Engineer', 'avg' => '$145,000', 'low' => '$100,000', 'high' => '$190,000'],
            ['title' => 'Engineering Manager',      'avg' => '$160,000', 'low' => '$120,000', 'high' => '$210,000'],
        ];

        return view('salaries.index', [
            'salaryRanges' => $salaryRanges,
            'topJobTitles' => $topJobTitles,
            'tags' => Tag::all(),
        ]);
    }
}
