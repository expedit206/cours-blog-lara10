<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['Laravel', 'Tailwindcss', 'Nodejs', 'Symphony', 'Nextjs', 'Reactjs', 'Boostrap']);

        $tags->each(fn($tag) =>Tag::create(
            [
                'name'=>$tag,

                'slug'=>Str::slug($tag),
            ]
        ));
    }
}
