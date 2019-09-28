<?php
use Distributor\Kilogram;
use Illuminate\Database\Seeder;

class KilogramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $kilogram = new Kilogram();
        $kilogram->kilogram = 1;
        $kilogram->save();
        
        $kilogram = new Kilogram();
        $kilogram->kilogram = 2;
        $kilogram->save();

        $kilogram = new Kilogram();
        $kilogram->kilogram = 3;
        $kilogram->save();
        
        $kilogram = new Kilogram();
        $kilogram->kilogram = 7.5;
        $kilogram->save();
        
        $kilogram = new Kilogram();
        $kilogram->kilogram = 10;
        $kilogram->save();
        
        $kilogram = new Kilogram();
        $kilogram->kilogram = 12;
        $kilogram->save();

        $kilogram = new Kilogram();
        $kilogram->kilogram = 15;
        $kilogram->save();
        
        $kilogram = new Kilogram();
        $kilogram->kilogram = 20;
        $kilogram->save();
        
        $kilogram = new Kilogram();
        $kilogram->kilogram = 21;
        $kilogram->save();

    }
}
