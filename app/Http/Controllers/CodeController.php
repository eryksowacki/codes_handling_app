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
        // sprawdzenie czy w inpucie jest wartość
        if($request -> has('codesQuantity'))
        {
            // tworzenie nowego obiektu code
            $code = new Code();

            // przypisanie wartości z inputa
            $code->codesQuantity = $request->codesQuantity;

            // pętla wykonująca się tak długo aż zostanie wygenerowana żądana ilość elementów
            for($i = 1; $i < ($code->codesQuantity + 1); $i++)
            {
                // inicjalizacja tablicy
                $tab = array();

                // pętla losująca numer od 0 do 9
                for($j = 0; $j < 10; $j++)
                {
                    // funkcja rand generująca losową cyfrę
                    $randomNumber = rand(0, 9);
                    // przypisywanie losowej cyfry do tablicy
                    $tab[$j] = $randomNumber;
                } 
                // rozdzielenie danych z tablicy
                $randomNumbers = implode("", $tab);
    
                // wyciągnięcie wartości z bazy danych
                $valueInDatabase = DB::table('codes')
                                ->select('code')
                                ->get();
    
                /* 
                    porównanie wartości z bazy z wartościami z tablicy
                    w celu sprawdzenia czy istnieje już w bazie danych
                    i zwrócenie informacji jeśli istnieje
                */
                foreach($valueInDatabase as $values)
                {
                    if($values == $randomNumbers)
                    {
                        return "Wygenerowany kod istnieje już w bazie danych";
                    }
                }

                // wyciągnięcie największej wartości id z bazy
                $idFromDatabase = DB::table('codes')->max('id');
                $idFromDatabase++;

                // dzisiejsza data
                $date = date("Y-m-d");

                // dodanie do bazy wartości id, losowej liczby i aktualnej daty
                DB::table('codes')->insert([
                    'id' => $idFromDatabase,
                    'code' => $randomNumbers,
                    'date' => $date
                ]);
            }
            // zwrócenie widoku z wiadomością o sukcesie 
            return view('/codes')->with('successMsg', 'Kody zostały pomyślnie wygenerowane i dodane do bazy danych.');
        }
        else
        {
            // powrót do poprzedniego widoku jeśli input nie ma nic do przekazania
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

     // funkcja usuwająca kody podane w textarea
    public function destroy(Request $request)
    {
        // sprawdzenie czy w textarea została podana wartość
        if($request -> has('codesToDelete'))
        {
            // tworzenie nowego obiektu Code
            $codes = new Code();

            $codes -> codesToDelete = $request -> codesToDelete;
            
            // usuwanie wartości podanej w textarea z bazy
            DB::table('codes')
                ->where('code', $codes->codesToDelete)
                ->delete();
            // zwracanie widoku po usunięciu
            return view('/delete')->with('warningMsg', 'Kod został pomyślnie usunięty z bazy.');
        }
        else
        {
            //zwracanie widoku jeśli w textarea nie została podana żadna wartość
            return view('/delete');
        }

        //---------------------------------------------------

        // Tak próbowałem, niestety cały czas usuwa tylko pierwszy element tablicy:

        // if($request -> has('codesToDelete'))
        // {
        //     $codes = new Code();

        //     $codes -> codesToDelete = $request -> codesToDelete;

        //     $code = explode(",", $codes->codesToDelete);

        //     $numberOfCodesInTab = count($code);

        //     $codesFromDatabase = DB::table('codes')
        //         ->select('code')
        //         ->get();

        //     for($i = 0; $i < $numberOfCodesInTab; $i++)
        //     {
        //         foreach($codesFromDatabase as $value)
        //         {
        //             if($value == $code[$i])
        //             {
        //                 DB::table('codes')
        //                 ->where('code', $code[$i])
        //                 ->delete();
        //             }
        //         }
        //     }
        //     return view('/delete');
        // }
        // else
        // {
        //     return view('/delete');
        // }
    }
}