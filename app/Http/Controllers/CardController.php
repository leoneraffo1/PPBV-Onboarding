<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardViewUsers;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $card = Card::where("course_fk", $request->course)->orderBy("order")->get();

        return response()->json($card);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => 'required|string|max:191',
            "description" => 'required|string|max:255',
            "image" => 'required|string|max:191',
            "course_fk" => 'required|exists:courses,id',
        ]);
        $lastOrder = Card::where('course_fk', $validated['course_fk'])->max('order');

        $validated['order'] = $lastOrder ? $lastOrder + 1 : 1;

        $card = Card::create($validated);

        return response($card, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $card->load(['archive:id,path']);
        return response()->json($card);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $validated = $request->validate([
            "title" => 'required|string|max:191',
            "description" => 'required|string|max:255',
            "image" => 'required|string|max:191',
            "order" => 'required|integer',
            "course_fk" => 'required|exists:courses,id',
        ]);

        $card = $card->update($validated);

        return response($card, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        CardViewUsers::where("card_fk", $card->id)->delete();
        $card->delete();
        return response()->json("Card deletado com sucesso");
    }

    public function updateOrder(Request $request, Card $card)
    {
        $card->order =  $request->order;
        $card->save();

        return response()->json(["message" => "Card ajustado com sucesso"]);
    }

    public function viewCard(Request $request, Card $card)
    {
        $user = $request->user();
        $cardView = CardViewUsers::where("user_fk", $user->id)->where("card_fk", $card->id)->first();
        if ($cardView == null) {
            $cardView = new CardViewUsers();
            $cardView->card_fk = $card->id;
            $cardView->user_fk = $user->id;
            $cardView->save();
        }
        return response()->json(["message" => "Card visualizado com sucesso"]);
    }
}
