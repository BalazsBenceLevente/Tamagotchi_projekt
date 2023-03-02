<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\allatResource;
use App\Http\Requests\allatRequest;
use App\Models\Allat;

class AllatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Allat::all();
        return allatResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(allatRequest $request)
    {
        $newanimal = new Allat();
        $newanimal -> animaltype = $request->validated()['animaltype'];
        $newanimal -> animalimg = $request->validated()['animalimg'];
        $newanimal -> save();
        return new allatResource($newanimal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Allat::findorfail($id);
        return new allatResource($data);
    }
}