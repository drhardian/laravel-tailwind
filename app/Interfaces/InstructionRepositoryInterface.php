<?php

namespace App\Interfaces;

interface InstructionRepositoryInterface
{
    public static function createInstruction($request);
    public static function updateInstruction($request, $instruction);
}