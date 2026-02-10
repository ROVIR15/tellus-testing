<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    /**
     * Handle the incoming file upload request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,csv,json,xml',
                'max:10240', // 10MB max
            ],
        ]);

        $uploadedFile = $request->file('file');
        
        // Generate a unique filename
        $filename = time() . '_' . Str::random(10) . '.' . $uploadedFile->getClientOriginalExtension();
        
        // Store the file in the public disk under 'uploads' directory
        $path = $uploadedFile->storeAs('uploads', $filename, 'public');

        // Save metadata to database
        $fileRecord = File::create([
            'original_name' => $uploadedFile->getClientOriginalName(),
            'filename' => $filename,
            'path' => $path,
            'disk' => 'public',
            'extension' => $uploadedFile->getClientOriginalExtension(),
            'mime_type' => $uploadedFile->getMimeType(),
            'size' => $uploadedFile->getSize(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'File uploaded successfully',
            'data' => [
                'id' => $fileRecord->id,
                'path' => $fileRecord->path,
                'url' => $fileRecord->url,
                'filename' => $fileRecord->filename,
                'original_name' => $fileRecord->original_name,
                'extension' => $fileRecord->extension,
                'size' => $fileRecord->size,
            ]
        ], 201);
    }
}
