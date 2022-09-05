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
    public function delete(Request $request,$id){
        ModelCard::delete([
             'titulo' => $request->titulo,
             'descricao' => $request->descricao
             
         ]);
 
         return redirect()->action([HomeController::class, 'index']); 
    }

    public function store(Request $request){
       ModelCard::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao
            
        ]);

        return redirect()->action([HomeController::class, 'index']); 
    }

    public function update(Request $request, $id){
        // dd($request);
        
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'anexo' => 'required|csv,txt,xlx,xls,pdf|max:2048'
        ]);

        if($request->hasFile('local_arquivo')){
            $file = $request->local_arquivo;
            $doc->arquivo_title = $file->getClientOriginalName();
            $doc->local_arquivo = $file->store('DocumentosEstagio');
        }
        $card = ModelCard::where('id_card',$id)->first();
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
