<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\ArchiveHasCard;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class ArchiveController extends Controller
{

    public function downloadArchive(Request $request)
    {
        try {
            if (Storage::disk('public')->exists('file/' .  $request->filename)) {
                return response()->download(storage_path('app/public/file/' . $request->filename));
            }
        } catch (Exception $ex) {
            return response()->json(["message" => "Falha ao consultar arquivo", "error" => $ex->getMessage()]);
        }
    }

    public function getImage(Request $request)
    {
        try {
            if (Storage::disk('public')->exists('images/' .  $request->filename)) {
                $fileUrl = Storage::disk('public')->get('images/' . $request->filename);
                $response = Response::make($fileUrl, 200)->header("Content-Type", 'png');
                return $response;
            }
        } catch (Exception $ex) {
            return response()->json(["message" => "Falha ao consultar arquivo", "error" => $ex->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            ini_set('upload_max_filesize', '20M');
            ini_set('post_max_size', '20M');
            $file = $request->file('file');
            $ext = $file->extension();
            $fileName = (string) Str::uuid();

            Storage::disk('public')->put('file/' . $file->getClientOriginalName(), file_get_contents($file));
            $archive = new Archive();
            $archive->path = $file->getClientOriginalName();
            $archive->save();

            $archiveHasCard = new ArchiveHasCard();
            $archiveHasCard->card_fk = $request->card;
            $archiveHasCard->archive_fk = $archive->id;
            $archiveHasCard->save();


            return response()->json(['message' => 'File uploaded', "file" => $archive], 200);
        } catch (Exception $ex) {
            return response()->json(["message" => "Erro ao salvar arquivo", "error" => $ex->getMessage()]);
        }
    }

    public function storeImage(Request $request)
    {
        try {
            ini_set('upload_max_filesize', '20M');
            ini_set('post_max_size', '20M');
            $file = $request->file('file');
            $ext = $file->extension();
            $fileName = (string) Str::uuid();

            Storage::disk('public')->put('images/' . $fileName . '.' . $ext, file_get_contents($file));


            return response()->json(['message' => 'File uploaded', "file" => $fileName . '.' . $ext], 200);
        } catch (Exception $ex) {
            return response()->json(["message" => "Erro ao salvar arquivo", "error" => $ex->getMessage()]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        $archive->delete();

        return response()->json(["Arquivo excluido com sucesso"], 204);
    }
}
