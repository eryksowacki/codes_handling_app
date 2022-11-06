<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\resources\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CodeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(isset($request -> input['codesQuantity']))
        {
            $codesQuantity = $request -> input['codesQuantity'];

            for($i = 1; $i < ($codesQuantity + 1); $i++)
            {
                $randomNumber = rand(1000000000, 9999999999);
                
                if($randomNumber < 10000000000 || $randomNumber > 9999999999)
                {
                    return "Wylosowano błędną liczbę";
                }
    
                $valueInDatabase = DB::table('codes')
                                    ->select('code')
                                    ->get();
    
                foreach($valueInDatabase as $values)
                {
                    if($values == $randomNumber)
                    {
                        return "Wygenerowany kod istnieje już w bazie danych";
                    }
                }
    
                DB::insert("insert into codes (id, code, date) values ( , $randomNumber, )");
                
                redirect()->back();
            }
        }
        else
        {
            return view('/create');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('/codes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Code $code)
    {
        return view('/codes');
    }
}