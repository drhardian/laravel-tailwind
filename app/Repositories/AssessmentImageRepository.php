<?php

namespace App\Repositories;

use App\Interfaces\AssessmentImageRepositoryInterface;
use App\Models\SiteWalkDown\AssessmentImage;
use App\Models\SiteWalkDown\TempImage;
use Illuminate\Support\Facades\Storage;

class AssessmentImageRepository implements AssessmentImageRepositoryInterface
{
    public static function getImagePathBySubjectId($assessmentId)
    {
        $temporaryFolder = "temp/";
        $images = [];
        $assessmentImages = AssessmentImage::select('subject_id')->where('assessment_id', $assessmentId)->orderBy('subject_id')->groupBy('subject_id')->get();

        foreach ($assessmentImages as $assessmentImage) {
            $path = [];
            $assessmentImageDetails = AssessmentImage::select('file_initial_name','file_name','path')
                ->where([
                    ['assessment_id', '=', $assessmentId],
                    ['subject_id', '=', $assessmentImage->subject_id]
                ])
                ->get();

            foreach ($assessmentImageDetails as $assessmentImageDetail) {
                Storage::disk('s3')->copy(
                    $assessmentId . '/' . $assessmentImageDetail->file_name, #destination location
                    $temporaryFolder . $assessmentId . '/' . $assessmentImageDetail->file_name #source location
                );

                TempImage::updateOrCreate(
                    [
                        'assessment_id' => $assessmentId,
                        'subject_id' => $assessmentImage->subject_id,
                        'file_name' => $assessmentImageDetail->file_name,
                    ],
                    [
                        'file_initial_name' => $assessmentImageDetail->file_initial_name,
                        'path' => env('CLOUDFRONT_ENDPOINT') . $temporaryFolder . $assessmentId . '/' . $assessmentImageDetail->file_name,
                    ]
                );
            }

            $getFromTempImages = TempImage::select('id','path')
                ->where([
                    ['assessment_id', '=', $assessmentId],
                    ['subject_id', '=', $assessmentImage->subject_id]
                ])
                ->get();

            foreach ($getFromTempImages as $image) {
                $path[] = [$image->id, $image->path];
            }

            $images[] = array($assessmentImage->subject_id => $path);
        }

        return $images;
    }
}
