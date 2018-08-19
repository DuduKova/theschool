<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class, 50)->create()->each(function ($u) {
            $u->courses()->save(factory(App\Course::class)->make());
        });
    }
}
