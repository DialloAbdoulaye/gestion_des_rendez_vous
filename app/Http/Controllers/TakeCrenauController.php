<?php

namespace App\Http\Controllers;

use App\Crenau;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TakeCrenauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCreneau=  Crenau::paginate(3);
        return response()->json($allCreneau);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getCreneau = Crenau::where(['heure_rdv'=>$request->heure_rdv,'date_rdv'=>$request->date_rdv])->get();
         $getCountRdv =$getCreneau->count();
        $validation= $request->validate([
             'phone'=>'required|numeric',
             'date_rdv'=>'required',
             'heure_rdv'=>'required',
         ]);
        if( $validation)
        {
            if($getCountRdv<10){
                $createCreneau= Crenau::create($request->all());
                if($createCreneau){
                    return response()->json([
                        'success'=>true,
                        'message'=>"Votre rendez vous a été prise en  compte."
                    ]);
                }
            }else{
                return response()->json([
                    'success'=>false,
                    'message'=>"Il n'y plus de place pour cette heure pour cette date."
                ]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $todayDate = Carbon::now();
        $formatedDate =$todayDate->format('d/m/Y');

        $dayRdv = Crenau::where('date_rdv',$formatedDate)->get();
        return $dayRdv;

        return response()->json($dayRdv);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
