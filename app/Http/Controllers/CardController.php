<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Card;

class CardController extends ApiController
{
    public function csrfToken(Request $request)
    {
        return $request->session()->get('key');
    }

    public function showCards($cardsId)
    {
        $cards = Card::whereIn('id', json_decode($cardsId))->get();

        return $this->showAll($cards);
    }
}
