<?php

use Illuminate\Database\Seeder;
use App\Category;

class DefaultCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating list of categories
        $categories = [
          ['name' => 'Pajak', 'code' => '4000', 'parent_code' => '4'],
          ['name' => 'Utilities', 'code' => '4100', 'parent_code' => '4'],
          ['name' => 'Transportasi', 'code' => '4200', 'parent_code' => '4'],
          ['name' => 'Rumah Tangga', 'code' => '4300', 'parent_code' => '4'],
          ['name' => 'Sekolah', 'code' => '4400', 'parent_code' => '4'],
          ['name' => 'Sumbangan', 'code' => '4500', 'parent_code' => '4'],
          ['name' => 'Liburan', 'code' => '4600', 'parent_code' => '4'],
          ['name' => 'Premi Asuransi', 'code' => '4700', 'parent_code' => '4'],
          ['name' => 'Kesehatan', 'code' => '4800', 'parent_code' => '4'],
          ['name' => 'Hadiah', 'code' => '4900', 'parent_code' => '4'],
          ['name' => 'Hobby', 'code' => '4A00', 'parent_code' => '4'],
          ['name' => 'Biaya Bank', 'code' => '4B00', 'parent_code' => '4'],
          ['name' => 'Lain-lain', 'code' => '4ZZZ', 'parent_code' => '4'],
          ['name' => 'Bensin', 'code' => '4201', 'parent_code' => '4200'],
          ['name' => 'Bengkel', 'code' => '4202', 'parent_code' => '4200'],
          ['name' => 'Parkir', 'code' => '4203', 'parent_code' => '4200'],
          ['name' => 'Tol', 'code' => '4204', 'parent_code' => '4200'],
          ['name' => 'Transportasi Umum', 'code' => '4205', 'parent_code' => '4200'],
          ['name' => 'Listrik', 'code' => '4101', 'parent_code' => '4100'],
          ['name' => 'TV Kabel', 'code' => '4102', 'parent_code' => '4100'],
          ['name' => 'Telepon Genggam', 'code' => '4103', 'parent_code' => '4100'],
          ['name' => 'Telepon Rumah', 'code' => '4104', 'parent_code' => '4100'],
          ['name' => 'Internet', 'code' => '4105', 'parent_code' => '4100'],
          ['name' => 'Makan di Luar', 'code' => '4301', 'parent_code' => '4300'],
          ['name' => 'Belanja Bulanan', 'code' => '4302', 'parent_code' => '4300'],
          ['name' => 'Pesawat', 'code' => '4601', 'parent_code' => '4600'],
          ['name' => 'Akomodasi', 'code' => '4602', 'parent_code' => '4600'],
          ['name' => 'Transportasi', 'code' => '4603', 'parent_code' => '4600'],
          ['name' => 'Belanja', 'code' => '4604', 'parent_code' => '4600'],
          ['name' => 'Makan Minum', 'code' => '4610', 'parent_code' => '4600'],
          ['name' => 'Olahraga', 'code' => '4A01', 'parent_code' => '4A00'],
          ['name' => 'Gambar', 'code' => '4A02', 'parent_code' => '4A00'],
          ['name' => 'Elektronika', 'code' => '4A03', 'parent_code' => '4A00']
        ];

        foreach($categories as $category){
          $slug = str_replace(" ", "-", strtolower($category['name']));
          $newCategory = new Category;
          $newCategory->name = $category['name'];
          $newCategory->code = $category['code'];
          $newCategory->parent_code = $category['parent_code'];
          $newCategory->slug = $slug;
          $newCategory->save();
        }
    }
}
