<?php

namespace App\Interfaces;

interface AssessmentImageRepositoryInterface
{
    public static function getImagePathBySubjectId($assessmentId);
}