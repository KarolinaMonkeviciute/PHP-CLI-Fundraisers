<?php

namespace App\Controllers;

use App\Base\ArgumentResolver;
use App\Base\Output;

class DonationController extends CommonController
{

    public function add(ArgumentResolver $argumentResolver){
        $argumentResolver->numericValidation('charityId');
        $argumentResolver->numericValidation('amount');
        $argumentResolver->isEmpty('name');
        $argumentResolver->isEmpty('dateTime');

        $charityId = (int) $argumentResolver->findArguments('charityId')->getValue();
        $name = $argumentResolver->findArguments('name')->getValue();
        $amount = (int) $argumentResolver->findArguments('amount')->getValue();
        $dateTime = $argumentResolver->findArguments('dateTime')->getValue();

        if(!$this->database->showCharity($charityId)){
            Output::writeLine('Charity ' . $charityId. ' does not exist');
            die();
        }

        if($this->database->addDonation($charityId, $name, $amount, $dateTime)){
            Output::writeLine('Successfully added amount to charity', 'success');
        } else {
            Output::writeLine('Failed to add amount to charity', 'error');
        }
    }
}