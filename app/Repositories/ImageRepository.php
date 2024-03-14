<?php

namespace App\Repositories;

use App\Interfaces\ImageRepositoryInterface;
use App\Models\SiteWalkDown\AssessmentImage;
use App\Models\SiteWalkDown\TempImage;
use Illuminate\Support\Facades\Storage;

class ImageRepository implements ImageRepositoryInterface
{
    public static function moveImageFiles($assessmentId, $productId)
    {
        $temporaryFolder = "temp/";
        $s3 = Storage::disk('s3');

        $tempFiles = TempImage::select('file_name','subject_id','file_initial_name')->where('assessment_id', $assessmentId)->get();

        foreach ($tempFiles as $file) {
            # copy images into actual assessment folder
            if($s3->copy($temporaryFolder . $assessmentId . '/' . $file->file_name, $assessmentId . '/' . $file->file_name)) {
                AssessmentImage::updateOrCreate(
                    [
                        'assessment_id' => $assessmentId,
                        'subject_id' => $file->subject_id,
                        'file_name' => $file->file_name
                    ],
                    [
                        'product_id' => $productId,
                        'file_initial_name' => $file->file_initial_name,
                        'path' => env('CLOUDFRONT_ENDPOINT') . $assessmentId . '/' . $file->file_name,
                    ]
                );

                $deleteTempData = TempImage::where([
                    [ 'assessment_id', '=', $assessmentId ],
                    [ 'file_name', '=', $file->file_name ],
                ])->delete();

                if($deleteTempData) {
                    $s3->delete($temporaryFolder . $assessmentId . '/' . $file->file_name);
                }
            }
        }
    }

    public static function updateImageFiles($assessmentId, $productId)
    {
        $existingImagesArray = [];
        $getExistingImages = AssessmentImage::where('assessment_id', $assessmentId)->get();
        $getTempImage = TempImage::where('assessment_id', $assessmentId)->get();
    }
}
