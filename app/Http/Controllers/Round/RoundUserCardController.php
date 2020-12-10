<?php

namespace App\Http\Controllers\Round;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Game;
use App\Card;
use App\Round;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Events\UserSentCard;

class RoundUserCardController extends ApiController
{

    public function store(Request $request, Round $round, User $user)
    {
        $cards = json_decode($request['cards']);

        //$cards = json_decode("[2411,703]");
        $cards = Card::whereIn('id', $cards)->get();

        event(new UserSentCard($user, $cards));

        //print_r($request['cards']);
        
        return 0;

        // $cards = json_decode($request['cards']);

        // foreach($cards as $card)
        // {
        //     DB::table('round_cards')
        //         ->insert(['user_id' => $user->id,
        //             'round_id' => $round->id,
        //             'card_id' => $card]);
        // }

        // $cards = Card::whereIn('id', $cards)->get();

        // event(new UserSentCard($user, $cards));

        // return 0;
    }

    public function index(Round $round, User $user)
    {
        return "stiff";
    }
}
