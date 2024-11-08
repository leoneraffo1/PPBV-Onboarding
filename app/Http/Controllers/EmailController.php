<?php

namespace App\Http\Controllers;

use App\Mail\suporteppvb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // $user = $request->user();
        // $data = [
        //     'title' => 'Reporte de erro, usuário: ' . $user->name,
        //     'message' => $request->message
        // ];
        $request->validate([
            'message' => 'required|string',
        ]);

        $messageContent = $request->input('message');

        Mail::to('suporteppvb@gmail.com')->send(new suporteppvb($messageContent));

        return response()->json("E-mail enviado com sucesso!");
    }
}
