<?php

namespace App\Http\Controllers;

use App\Interfaces\AssessmentImageRepositoryInterface;

class AssessmentImageController extends Controller
{
    private AssessmentImageRepositoryInterface $assessmentImageRepository;

    public function __construct(
        AssessmentImageRepositoryInterface $assessmentImageRepository,
    )
    {
        $this->assessmentImageRepository = $assessmentImageRepository;
    }

    public function getAssessmentImages()
    {
        return $this->assessmentImageRepository->getImagePathBySubjectId(request('assessmentId'));
    }
}
