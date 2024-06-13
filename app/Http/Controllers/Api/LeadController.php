<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    //

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'firstname' => 'required|min:3|max:255',
            'lastname' => 'required|min:3|max:255',
            'email' => 'required|email',
            'content' => 'required|min:3|max:500',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'error'=>$validator->errors()
            ]);
        }
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();
        
        return response()->json([
        'success'=>true
        ]);
    }
}
