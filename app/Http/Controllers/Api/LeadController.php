<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;
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
        // ritorno errore 
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'error'=>$validator->errors()
            ]);
        }

        // salvare dati nel db 
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();
        
        // invio email 
        Mail::to('adminproject@gmail.com')->send(new NewContact($newLead));

        // ritorno success json 
        return response()->json([
        'success'=>true
        ]);
    }
}
