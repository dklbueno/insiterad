<?php

use Illuminate\Database\Seeder;

class TableDlpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'head' => 0.0023,
            'neck' => 0.0054,
            'chest' => 0.017,
            'abdomen' => 0.015,
            'pelvis' => 0.019,
            'heart' => 0.0014,
        ];
        foreach ($data as $k=>$v) {
            DB::table('table_dlps')->insert([
                'region' => $k,
                'msv' => $v,
            ]);
        }
    }
}
