<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            [
                'brand_id' => 1,
                'category_id' => 2,
                'concentration_id' => 1,
                'slug' => 'lawenda-dla-panow',
                'name' => 'Lawenda dla panów',
                'description' => 'Lavare po łacinie, włosku i hiszpańsku znaczy myć, czyścić i prać.
                Silny zapach lawendy, w połączeniu z aksamitną wanilią tworzą niepowtarzalną, męską aurę. Naturalna, niefrakcjonowana lawenda, w której można odnaleźć chłód lasu i zapach łąki. Delikatna i mleczna wanilia, z akcentami tytoniu i skóry. Drewno sandałowe, z niewielkim dodatkiem pikantnego cynamonu. Lawenda, wanilia, sandał jak i cynamon, występujące w składzie, są naturalne.
                <br>
                <div><strong>początek:</strong> lawenda. <strong>środek:</strong> wanilia. <strong>koniec:</strong> drewno sandałowe, cynamon, piżmo</div>
                ',
                'img' => 'lawenda-dla-panow.jpg',
                'site_description' => 'Lawendowa woda kolońska dla mężczyzn',
                'site_keyword' => 'lawendowa woda kolońska, polska woda kolońska, klasyczna woda kolońska, naturalna woda kolońska, lawenda, Ernest Daltroff, Caron Pour Un Homme',
            ]
        );
        DB::table('products')->insert(
            [
                'brand_id' => 1,
                'category_id' => 2,
                'concentration_id' => 1,
                'slug' => 'bergamota-dla-panow',
                'name' => 'Bergamota dla panów',
                'description' => 'Donec a felis in est pellentesque fringilla. Donec erat metus, efficitur a justo in, condimentum vehicula est. Pellentesque lobortis nunc et mauris aliquet, non semper dolor malesuada. Morbi congue mi tempus erat malesuada, quis cursus urna vehicula. Sed vehicula vehicula elit in convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porta, lorem quis consectetur commodo, nisl turpis euismod lorem, non consectetur nulla erat eu nisi.',
                'img' => 'bergamota-dla-panow.jpg',
                'site_description' => 'Woda kolońska o zapachu bergamotki',
                'site_keyword' => 'bergamotka, bergamota, bergamotowa woda kolońska',
            ]
        );
    }
}
