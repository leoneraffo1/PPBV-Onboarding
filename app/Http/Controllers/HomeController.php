<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelCard;


class HomeController extends Controller{
    //variaveis
    
    private $objCard;
    //functions
    public function __construct(){
        
        $this->objCard = new ModelCard();
    }
    //a ser implementado

    public function delete($id){
        $this->objCard->destroy($id); 
        return redirect()->action([HomeController::class, 'index']); 
    }

    public function store(Request $request){
        //Upload de imagem
        
        $midiaName="boa";
        
        if($request->hasFile('midia')){
            $midiaName = time().'.'.$request->midia->extension();
            $path = $request->midia->move(public_path('images/cards'), $midiaName);
        }
        
        
        ModelCard::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'midia' => $midiaName
            
        ]);

        return redirect()->action([HomeController::class, 'index']); 
    }

    public function update(Request $request, $id){
        // dd($request);
        $card = ModelCard::where('id_card',$id)->first();
        if($request->has('delete')){
            $this->objCard->destroy($id); 
            return redirect()->action([HomeController::class, 'index']);
        }


        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            // 'anexo' => 'required|csv,txt,xlx,xls,pdf|max:2048'
        ]);

        if($request->hasFile('dzImg')){
            $imgName = time().'.'.$request->dzImg->extension();
            $path = $request->dzImg->move(public_path('images/cards'), $imgName);
            $request->midia = $imgName;
            $card->midia = $request->midia;
            $card->save();


        }

        if($request->hasFile("dzAtt{{$card->id_card}}")){
            $attName = time().'.'.$request->dzAtt->extension();
            $path = $request->dzAtt->move(public_path('attachments/cards'), $attName);
            $request->anexo = $attName;
            $card->anexo = $request->anexo;    
            $card->save();
        }

        // if($request->hasFile('local_arquivo')){
        //     $file = $request->local_arquivo;
        //     $doc->arquivo_title = $file->getClientOriginalName();
        //     $doc->local_arquivo = $file->store('DocumentosEstagio');
        // }
        $card->titulo = $request->titulo;
        $card->descricao = $request->descricao; 
        $card->save();
        return redirect()->action([HomeController::class, 'index']);  

    }

    // public function deleteCard(Request $request){
    //     ModelCard::delete;
    // }

    public function index(){
        $card = $this->objCard->all();
        $image = '/storage/app/public';
        return view('home',compact('card'));
        // dd($this->objCard->all());
    }
}
