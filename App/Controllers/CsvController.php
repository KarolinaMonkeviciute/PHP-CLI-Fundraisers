<?php

namespace App\Controllers;

use App\Base\ArgumentResolver;
use App\Base\Output;

class CsvController extends CommonController
{
    public function upload(ArgumentResolver $argumentResolver):void {
        $argumentResolver->validateFilePath('filepath');
        $filePath = $argumentResolver->findArguments('filepath')->getValue();
        $handle = fopen($filePath, 'r');
        if($handle !== false){
            while(($columns = fgetcsv($handle)) !== false){
                if(count($columns) === 2){
                    $name = $columns[0];
                    $email = $columns[1];
                    $this->database->createCharity($name, $email);
                }
            }
            fclose($handle);

            Output::writeLine('Successfully uploaded CSV', 'success');
        }
    }
}