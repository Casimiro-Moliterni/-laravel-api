<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
class LeadController extends Controller
{
    //

    public function store(Request $request){
        $data=$request->all();
        $newLead= new Lead();
        $newLead->fill($data);
        $newLead->save();
        dd($data);
    }
}
