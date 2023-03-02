<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\kedvencResource;
use App\Models\Kedvenc;
use App\Http\Requests\kedvencRequest;
use App\Http\Requests\statisztikaRequest;
use Illuminate\Support\Facades\Auth;

class KedvencController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->UsersPets;
        return kedvencResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kedvencRequest $request)
    {
        $newpet = new Kedvenc();
        $newpet->users_id = Auth::id();
        $newpet->animals_id = $request->validated()['animals_id'];
        $newpet->petname = $request->validated()['petname'];
        $newpet->hunger = 100;
        $newpet->thirst = 100;
        $newpet->mood = 100;
        $newpet->fatigue = 100;
        $newpet->birth = date('Y-m-d');
        $newpet->save();
        return new kedvencResource($newpet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kedvenc::findorFail($id);
        return new kedvencResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(kedvencRequest $request, $id)
    {
        $data = Kedvenc::findOrFail($id);
        $data->petname = $request->validated()['petname'];
        /*$data->hungerdate = dateTime('Y-m-d H:i:s');*/
        $data->save();
        return new kedvencResource($data);
    }

    public function updateStat(statisztikaRequest $request, $id)
    {
        $data = Kedvenc::findOrFail($id);
        $data->hunger = $request->validated()['hunger'];
        $data->thirst = $request->validated()['thirst'];
        $data->mood = $request->validated()['mood'];
        $data->fatigue = $request->validated()['fatigue'];
        $data->save();
        return new kedvencResource($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kedvenc::findOrFail($id)->delete();
    }
}