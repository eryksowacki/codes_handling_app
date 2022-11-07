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
        if($request -> has('codesQuantity'))
        {
            $code = new Code();

            $code->codesQuantity = $request->codesQuantity;

            for($i = 1; $i < ($code->codesQuantity + 1); $i++)
            {
                $tab = array();

                for($j = 0; $j < 10; $j++)
                {
                    $randomNumber = rand(0, 9);
                    $tab[$j] = $randomNumber;
                } 
                
                $randomNumbers = implode("", $tab);
    
                $valueInDatabase = DB::table('codes')
                                ->select('code')
                                ->get();
    
                foreach($valueInDatabase as $values)
                {
                    if($values == $randomNumbers)
                    {
                        return "Wygenerowany kod istnieje już w bazie danych";
                    }
                }

                $idFromDatabase = DB::table('codes')->max('id');
                $idFromDatabase++;

                $date = date("Y-m-d");


                DB::table('codes')->insert([
                    'id' => $idFromDatabase,
                    'code' => $randomNumbers,
                    'date' => $date
                ]);
            }
            return view('/codes');
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
    public function destroy(Request $request)
    {
        if($request -> has('codesToDelete'))
        {
            $codes = new Code();

            $codes -> codesToDelete = $request -> codesToDelete;

            $code = explode(",", $codes->codesToDelete);

            $numberOfCodesInTab = count($code);

            for($i = 0; $i < $numberOfCodesInTab; $i++)
            {
                DB::table('codes')
                    ->where('code', $code[$i])
                    ->delete();
            }
            return view('/delete');
        }
        else
        {
            return view('/delete');
        }
           
        function spacingMethod()
        {
            // funkcja sprawdzająca czym są oddzielone wartości z textarea
        }
    }
}