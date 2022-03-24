<?php

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags= ['blu','rosso','verde'];
        foreach ($tags as $tag_name) { 
            $new_tags = new Tag();
            $new_tags->name = $tag_name;
            $new_tags->slug = Str::of($tag_name)->slug('-');
            $new_tags->save();
        }
    }
}
