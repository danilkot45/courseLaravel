<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        $name = '<span style="color:green;"> Daniil</span>';
        $lastname = 'Krasavtsev';
        $people = [
            'Daniil Krasavtsev', 'Olya Bitos', 'Vitaliy Kuleb', 'Nikita Oparin', 'Ksenia Duraeva','Lizas Pup'
        ];
        $data = ['name' => $name, 'lastname' => $lastname, 'people' => $people];
        return view('pages.about', $data);
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
