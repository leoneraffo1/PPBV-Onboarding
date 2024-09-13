<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Models\ModelCard;

class HomeController extends Controller
{
    private $objCard;

    public function __construct()
    {
        $this->objCard = new ModelCard();
    }

    public function delete($id)
    {
        $this->objCard->destroy($id); 
        return redirect()->action([HomeController::class, 'index']); 
    }

    public function destroy($id_card)
    {
        $card = Card::findOrFail($id_card);
        $card->delete();

        return redirect()->route('home')->with('success', 'Card deletado com sucesso.');
    }

    public function store(StoreCardRequest $request)
    {
        $midiaName = "boa";
        
        if ($request->hasFile('midia')) {
            $midiaName = time() . '.' . $request->midia->extension();
            $request->midia->move(public_path('images/cards'), $midiaName);
        }
        
        $this->objCard->create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'midia' => $midiaName,
        ]);

        return redirect()->action([HomeController::class, 'index']);
    }

    public function update(UpdateCardRequest $request, $id)
{
    $card = $this->objCard->find($id);

    if ($request->has('delete')) {
        $this->objCard->destroy($id); 
        return redirect()->action([HomeController::class, 'index']);
    }

    // Verifica se o arquivo de imagem foi enviado e faz o upload
    if ($request->hasFile('dzImg')) {
        $imgName = time() . '.' . $request->file('dzImg')->extension();
        $request->file('dzImg')->move(public_path('images/cards'), $imgName);
        $card->midia = $imgName;
    }

    // Verifica se o arquivo anexo foi enviado e faz o upload
    if ($request->hasFile('dzAtt')) {
        $attName = time() . '.' . $request->file('dzAtt')->extension();
        $request->file('dzAtt')->move(public_path('attachments/cards'), $attName);
        $card->anexo = $attName;
    }

    $card->titulo = $request->titulo;
    $card->descricao = $request->descricao; 
    $card->save();

    return redirect()->action([HomeController::class, 'index']);  
}


    public function updateOrder(Request $request)
{
    $order = json_decode($request->input('order'), true);

    foreach ($order as $index => $id) {
        $card = ModelCard::find($id);
        $card->order = $index + 1; // Atribui a nova ordem
        $card->save();
    }
    return redirect()->action([HomeController::class, 'index']);
}


public function index()
{
    $card = ModelCard::orderBy('order', 'asc')->get();
    return view('home', compact('card'));
}

}
