<?php

namespace App\Http\Controllers\SiteWalkdown;

use App\Http\Controllers\Controller;

use App\Models\SiteWalkDown\AssessmentImage;
use App\Models\SiteWalkDown\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadDownloadController extends Controller
{
    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        $fileInitialName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid().'-'.now()->timestamp.'.'.$fileExtension;

        DB::beginTransaction();

        try {
            $imageUploadPath = 'temp/'.$request->assessmentId.'/'.$fileName;
            $s3 = Storage::disk('s3');
            $s3->put($imageUploadPath, file_get_contents($file));
            $url = env('CLOUDFRONT_ENDPOINT') . $imageUploadPath;

            $temps = TempImage::create([
                'assessment_id' => $request->assessmentId,
                'subject_id' => $request->subjectId,
                'file_initial_name' => $fileInitialName,
                'file_name' => $fileName,
                'path' => $url
            ]);

            DB::commit();

            return response()->json([
                'fileId' => $temps->id,
                'filePath' => $temps->path,
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function downloadFile(Request $request)
    {
        $path = TempImage::select('path')->where('assessment_id', $request->assessmentId)->where('subject_id', $request->subjectId)->get();

        dd($path->path);

        return response()->json(['path' => $path], 200);
    }

    public function removeFile(TempImage $image)
    {
        DB::beginTransaction();

        try {
            Storage::disk('s3')->delete('temp/'.$image->assessment_id.'/'.$image->file_name);

            $image->delete();

            DB::commit();

            return response()->json([
                'message' => 'File deleted successfully',
                'imageCount' => $image->count()
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
