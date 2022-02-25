<?php

namespace App\Http\Controllers;

use App\Models\Rheo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RheoController extends Controller
{
    public function index()
    {
        $con = odbc_connect('alam', '', '');

        $query = 'SELECT * FROM Dat200RH';
        $query_ex =  odbc_exec($con, $query);

        while ($data = odbc_fetch_array($query_ex)) {
            // $returnData[] = [
            //     'F1' => $data['F1'],
            //     'F2' => $data['F2'],
            //     'F10' => $data['F10'],
            //     'F11' => $data['F11'],
            //     'F12' => $data['F12'],
            //     'F13' => $data['F13'],
            //     'F14' => $data['F14'],
            //     'F14' => $data['F15'],
            //     'F17' => $data['F17'],
            //     'F21' => $data['F21'],
            //     'F22' => $data['F22'],
            //     'F28' => $data['F18'],
            //     'F16' => $data['F16'],
            //     'F70' => $data['F70']
            // ];
            $rheo = Rheo::where('idrheo', $data['F0'])->first();
            if (!$rheo) {
                $rheo = new Rheo();
                $rheo->idrheo = $data['F0'];
                $rheo->tanggal = $data['F1'];
                $rheo->jam = $data['F2'];
                $rheo->compd = $data['F10'];
                $rheo->shift = $data['F11'];
                $rheo->mesin = $data['F12'];
                $rheo->mixing = $data['F13'];
                $rheo->lot = $data['F14'];
                $rheo->batch = $data['F15'];
                $rheo->ml = $data['F17'];
                $rheo->mh = $data['F18'];
                $rheo->hasiltest = $data['F16'];
                $rheo->tc30 = $data['F21'];
                $rheo->tc95 = $data['F22'];
                $rheo->barcode = $data['F70'];
                $rheo->save();
            } else if ($rheo && $rheo->idrheo != $data['F0']) {
                $rheo->idrheo = $data['F0'];
                $rheo->save();
            } else if ($rheo && $rheo->batch != $data['F15']) {
                $rheo->batch = $data['F15'];
                $rheo->save();
            }
        }

        $rheo = Rheo::all();
        // dd($rheo);

        return view('rheo', ['data' => $rheo]);
    }
}
