<?php

namespace App\Base;

use InvalidArgumentException;

class ArgumentResolver
{
    private array $resolvedArguments = [];
    private array $arguments;

    public function __construct(array $arguments){
        $this->arguments = $arguments;
    }

    public function resolve(): self{
        foreach($this->arguments as $argument){
            if(str_starts_with($argument, '--')){
                if (!str_contains($argument, '=') || (($exploded = explode('=', $argument)) && empty($exploded[1]))){
                    throw new InvalidArgumentException('Arguments that start with -- must have a value assigned');
                }
                else{
                    $this->resolvedArguments[] = new Argument(
                        str_replace('--', '', $exploded[0]), $exploded[1]);
                }
            }
        }
        return $this;
    }

    public function findArguments(string $key): ?Argument{
        foreach($this->resolvedArguments as $argument){
            if($key === $argument->getKey()){
                return $argument;
            }
        }
        return null;
    }

    public function isEmpty(string $key): void{
        $argument = $this->findArguments($key);
        if(!$argument || empty($argument->getValue())){
            Output::writeLine('Key ' . $key .' not found');
            die();
        }
    }

    public function validateEmailFormat(string $key): void{
        $this->isEmpty($key);
        $email = $this->findArguments($key)->getValue();
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            Output::writeLine('Wrong email format', 'error');
            die();
        }
    }

    public function numericValidation(string $key): void{
        $this->isEmpty($key);
        $value = $this->findArguments($key)->getValue();

        if(!is_numeric($value)){
            Output::writeLine('Key ' . $key . ' must be numeric', 'error');
            die();
        }
        if($value < 0){
            Output::writeLine('Negative number value is not accepted', 'error');
            die();
        }
    }

    public function validateFilePath(string $key): void{
        $this->isEmpty($key);
        $filePath = $this->findArguments($key)->getValue();

        if(!file_exists($filePath)){
            Output::writeLine($filePath . ' incorrect file path', 'error');
            die();
        }
    }
}