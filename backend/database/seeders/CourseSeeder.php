<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use File;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1. Eliminar o truncar la tabla bootcamps
        Bootcamp::truncate();
        //2. Leer el archivo courses.json
        $json = File::get("database/_data/courses.json");
        //2.1 convertir el contenido json en un arreglo
        $arreglo_courses = json_decode($json);
        //3. Recorrer el archivo y por cada bootcamp 
        foreach($arreglo_bootcamps as $bootcamp){
            //4. Crear un bootcamp por cada uno
            $c = new Bootcamp();
            $c->title = $bootcamp->title;
            $c->description = $bootcamp->description;
            $c->weeks = $bootcamp->weeks;
            $c->enroll_cost = $bootcamp->enroll_cost;
            $c->minimum_skill = $bootcamp->minimum_skill;
            $c->bootcamp_id = 1;
            $c->save();
        }
    }
}
