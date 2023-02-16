<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Star;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(Request $request, int $starId): void
    {
        $fileModel = new File;

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->star_id = $starId;
            $fileModel->save();

            $star = Star::find($starId);
            $star->file_id = $fileModel->id;
            $star->save();
        }
    }
}
