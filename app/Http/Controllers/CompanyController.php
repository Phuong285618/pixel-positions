<?php

namespace App\Http\Controllers;

use App\Models\Employer;

class CompanyController extends Controller
{
    public function __invoke()
    {
        $companies = Employer::withCount('jobs')
            ->with(['jobs' => function ($query) {
                $query->latest()->with('tags')->limit(3);
            }])
            ->latest()
            ->get();

        return view('companies.index', [
            'companies' => $companies,
        ]);
    }
}
