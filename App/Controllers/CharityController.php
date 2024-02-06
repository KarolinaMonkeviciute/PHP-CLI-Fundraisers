<?php

namespace App\Controllers;

use App\Base\ArgumentResolver;
use App\Base\Output;

class CharityController extends CommonController
{

    public function charitiesList(): void{
       $list =  $this->database->showAllCharities();

       Output::writeLine('Charities list:', 'info');
       if (count($list)){
        foreach($list as $item){
            Output::writeLine(' ID: ' . $item->getId());
            Output::writeLine(' Name: ' . $item->getName());
            Output::writeLine(' Email: ' . $item->getEmail());
        }
       } else {
        Output::writeLine('Charities list is empty', 'info');
       }
    }

    public function create(ArgumentResolver $argumentResolver): void{
        $argumentResolver->isEmpty('name');
        $argumentResolver->validateEmailFormat('email');
        $name = $argumentResolver->findArguments('name')->getValue();
        $email = $argumentResolver->findArguments('email')->getValue();
        $this->database->createCharity($name, $email);

        Output::writeLine('Successfully created charity', 'success');
    }

    public function update(ArgumentResolver $argumentResolver): void {
        $argumentResolver->isEmpty('id');
        $argumentResolver->isEmpty('name');
        $argumentResolver->validateEmailFormat('email');

        $id = (int) $argumentResolver->findArguments('id')->getValue();
        $name = $argumentResolver->findArguments('name')->getValue();
        $email = $argumentResolver->findArguments('email')->getValue();
        
        if($this->database->updateCharity($$id, $name, $email)){
            Output::writeLine('Successfully updated charity', 'success');
        } else {
            Output::writeLine('Something went wrong', 'error');
        }
    }

    public function delete(ArgumentResolver $argumentResolver): void{
        $argumentResolver->numericValidation('id');

        $id = (int) $argumentResolver->findArguments('id')->getValue();

        if($this->database->deleteCharity($id)){
            Output::writeLine('Successfully deleted charity', 'success');
        } else {
            Output::writeLine('Something went wrong', 'error');
        }
    }
}