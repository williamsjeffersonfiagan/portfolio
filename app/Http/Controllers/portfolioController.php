<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show()
    {
        $projects = [
            [
                'title' => 'Projet Laravel', // J'ai ajouté le champ title manquant
                'description' => 'Site web avec Laravel',
                'image' => 'laravel-project.jpg',
                'tags' => ['Laravel', 'PHP', 'MySQL']
            ],
            // Ajoutez d'autres projets...
        ];

        $skills = [
            ['name' => 'Laravel', 'level' => 90, 'icon' => 'fab fa-laravel'],
            ['name' => 'Symfony', 'level' => 85, 'icon' => 'fab fa-symfony'],
            // Ajoutez d'autres compétences...
        ];

        return view('portfolio', compact('projects', 'skills'));
    }
}