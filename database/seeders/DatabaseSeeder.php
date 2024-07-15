<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories =[
        'Elettronica',
        'Abbigliamento',
        'Salute e Bellezza',
        'Motori',
        'Giocattoli',
        'Sport',
        'Libri e riviste',
        'Accessori',
        'Film e serie tv',
        'Casa e Giardinaggio'
    ];
    
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name'=>$category
            ]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
