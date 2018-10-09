<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\TableDlp;
use App\Calculation;
use Illuminate\Support\Facades\Response;
use Auth;

class CalculoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table_dlp = TableDlp::all();
        return Response::view('calculo', compact('table_dlp'))
                        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function store(Request $request)
    {
        if (! empty($request)) {
            foreach ($request->mgy as $key=>$val) {
                if ($val) {
                    $region = $key;
                    $mgy = $val;
                    $msv = $request->msv[$key];
                    $save = Calculation::create([
                        'region'=>$region,
                        'mgy'=>$mgy,
                        'msv'=>$msv,
                        'user_id'=>$request->user_id
                    ]);
                }
            }
        }
        $table_dlp = TableDlp::all();
        return redirect()->route('calculo')
                        ->with('success', 'Cálculo salvo com sucesso!');
    }

    public function list()
    {
        $calculation = Calculation::where('user_id', Auth::user()->id)->get();
        $fromto = [
            'head' => 'Head',
            'neck' => 'Neck',
            'chest' => 'Chest',
            'abdomen' => 'Abdomen',
            'pelvis' => 'Pelvis',
            'heart' => 'Heart'
        ];
        return Response::view('lista', compact('calculation', 'fromto'))
                        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function delete(Request $request)
    {
        $calculation = Calculation::find($request->id);
        $calculation->delete();
        return "ok";
    }
}
