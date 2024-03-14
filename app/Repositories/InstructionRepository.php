<?php

namespace App\Repositories;

use App\Interfaces\InstructionRepositoryInterface;
use App\Models\SiteWalkDown\Instruction;
use App\Models\SiteWalkDown\InstructionOtherarea;
use App\Models\SiteWalkDown\InstructionPerson;
use App\Models\SiteWalkDown\InstructionTagnum;

class InstructionRepository implements InstructionRepositoryInterface
{
    public static function createInstruction($request)
    {
        $instruction = Instruction::create($request->except('area_others', 'tag_numbers', 'engineers', 'date_activity','nextPage'));

        /* Insert other areas into table, receive from array */
        if(!empty($request->area_others)) {
            foreach ($request->area_others as $otherarea) {
                InstructionOtherarea::create([
                    'instruction_id' => $instruction->id,
                    'otherarea_id' => $otherarea
                ]);
            }
        }

        /* Insert persons into table, receive from array */
        foreach ($request->engineers as $engineer) {
            InstructionPerson::create([
                'instruction_id' => $instruction->id,
                'user' => $engineer
            ]);
        }

        /* Insert products into table, receive from array */
        if(!empty($request->tag_numbers)) {
            foreach ($request->tag_numbers as $tagnum) {
                InstructionTagnum::create([
                    'instruction_id' => $instruction->id,
                    'tagnumber' => $tagnum
                ]);
            }
        }
    }

    public static function updateInstruction($request, $instruction)
    {
        $instruction->date_activity_start = $request->date_activity_start;
        $instruction->date_activity_end = $request->date_activity_end;
        $instruction->company_id = $request->company_id;
        $instruction->area_id = $request->area_id;
        $instruction->notes = $request->notes;
        $instruction->save();

        /* Delete existing other area */
        InstructionOtherarea::where('instruction_id', $instruction->id)->delete();

        /* Insert other areas into table, receive from array */
        foreach ($request->area_others as $otherarea) {
            InstructionOtherarea::create([
                'instruction_id' => $instruction->id,
                'otherarea_id' => $otherarea
            ]);
        }

        /* Delete existing engineers */
        InstructionPerson::where('instruction_id', $instruction->id)->delete();

        /* Insert persons into table, receive from array */
        foreach ($request->engineers as $engineer) {
            InstructionPerson::create([
                'instruction_id' => $instruction->id,
                'user' => $engineer
            ]);
        }

        /* Delete existing products */
        InstructionTagnum::where('instruction_id', $instruction->id)->delete();

        /* Insert products into table, receive from array */
        if(!empty($request->tag_numbers)) {
            foreach ($request->tag_numbers as $tagnum) {
                InstructionTagnum::create([
                    'instruction_id' => $instruction->id,
                    'tagnumber' => $tagnum
                ]);
            }
        }
    }
}
