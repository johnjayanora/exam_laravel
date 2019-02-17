<?php

use Illuminate\Database\Seeder;

use App\Passers;

class PassersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputFileName = public_path('passers.xlsx');        
        $import_data = \Excel::load($inputFileName, function($reader) {
        })->get();
        
        $passer = [];
        if($import_data){
            $temp_id = '';
            $count = 0;
            $passer_data = [];
            foreach($import_data as $temp_data){
                $data = $temp_data[0];
                if($data){
                    
                    if(is_numeric($data)){
                        
                        $temp_id = $data;
                     
                    }
                    switch ($count) {
                        case 1:
                            $passer_data[$temp_id]['name'] = $data;
                            $passer_data[$temp_id]['created_at'] = date('Y-m-d H:i:s');
                            
                            break;
                        case 2:
                            $passer_data[$temp_id]['campus_eligibility'] = $data;
                            
                            break;
                        case 3:
                            $passer_data[$temp_id]['school'] = $data;
                            
                            break;
                        case 4:
                            $passer_data[$temp_id]['division'] = $data;
                            
                            break;
                        default:
                            
                        break;
                    }

                    
                    
                    $count++;
                }
                else{
                    $count = 0;
                }


            }

            if($passer_data){
                Passers::insert($passer_data);
                
            }

        }
    }
}
