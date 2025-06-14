<?php
namespace App\Http\Controllers;

use App\Models\Career;

class CareerController extends Controller {

    static array $options = [
        'only'       => [
            'index',
            'show',
        ],
        'names'      => [
            'index' => 'careers.index',
            'show'  => 'careers.show',
        ],
        'parameters' => [
            'carreras' => 'career',
        ],
    ];

    public function index() {
        return view('careers.index');
    }

    public function show($slug) {
        $career = Career::where('slug', $slug)
            ->first();

        if (! $career) {
            return redirect()->route('careers.index');
        }

        return view('careers.show', compact('career'));
    }
}
