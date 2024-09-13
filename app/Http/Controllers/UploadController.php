<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadMedia(Request $request, $path = 'images/cards')
    {
        $request->validate([
            'midia' => 'file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $fileName = time() . '.' . $request->midia->extension();
        $request->midia->move(public_path($path), $fileName);

        return $fileName;
    }

    public function uploadAttachment(Request $request, $path = 'attachments/cards')
    {
        $request->validate([
            'anexo' => 'file|mimes:pdf,doc,docx,xlsx,csv|max:2048',
        ]);

        $fileName = time() . '.' . $request->anexo->extension();
        $request->anexo->move(public_path($path), $fileName);

        return $fileName;
    }
}
