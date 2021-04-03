<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teams = Team::all();
        return view('match', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $match = new Match;
        $match->team1_id = $request->team1_id;
        $match->team2_id = $request->team2_id;
        $match->score_club1 = $request->score_club1;
        $match->score_club2 = $request->score_club2;
        $match->save();

        $message = "Match Has Been Submited SUCCESSFULLY";

        $team1 = Team::where('id', $match->team1_id)->first();
        $team2 = Team::where('id', $match->team2_id)->first();

        $team1->played = $team1->played + 1;
        $team2->played = $team2->played + 1;
        
        if ($match->score_club1 > $match->score_club2) {
            # code...
            $team1->won = $team1->won + 1;
            $team2->lost = $team2->lost + 1;

            $team1->points = $team1->points + 3;
            $team2->points = $team2->points + 0;

            $team1->save();
            $team2->save();
        }

        elseif ($match->score_club1 == $match->score_club2) {
            # code...
            $team1->drawn = $team1->drawn + 1;
            $team2->drawn = $team2->drawn + 1;

            $team1->points = $team1->points + 1;
            $team2->points = $team2->points + 1;

            $team1->save();
            $team2->save();
        }

        elseif ($match->score_club1 < $match->score_club2) {
            # code...
            $team1->lost = $team1->lost + 1;
            $team2->won = $team2->won + 1;

            $team1->points = $team1->points + 0;
            $team2->points = $team2->points + 3;

            $team1->save();
            $team2->save();
        }

        return redirect()->route('match.create')->with(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
