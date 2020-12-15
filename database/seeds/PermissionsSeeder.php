<?php

use Illuminate\Database\Seeder;
use App\permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_array = ['Can view dashboard','Can view Sensor Readings','Can add yield',
        'Can view yield','Can Add crop','Can view crops','Can add users','Can view user'];
        for($i=0; $i<count($permissions_array); $i++){
            if(permissions::where('id',$i)->exists()){
                $i = $i+1;
            }
            $permission_obj = new permissions;
            $permission_obj->id = $i;
            $permission_obj->permission =$permissions_array[$i];
            $permission_obj->save();
        }
    }
}
