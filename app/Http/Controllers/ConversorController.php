<?php

namespace App\Http\Controllers;
use App\Models\Conversao;
use Illuminate\Http\Request;

class ConversorController extends Controller
{
    public function converter(Request $request)
    {
        return $this->conversor($request->moeda1, $request->moeda2, $request->valor_converter);
    }

    public function gravar(Request $request)
    {
        $conversao = new Conversao();
        $conversao->fill($request->all());
        $conversao->valor_convertido = $this->conversor($request->moeda1, $request->moeda2, $request->valor_converter);
        $result = $conversao->save();
        return redirect('/conversor');
    }

    private function conversor($moeda1, $moeda2, $valor_converter)
    {
        $url = "https://api.exchangeratesapi.io/latest?base=" . $moeda1 . "&symbols=" . $moeda2;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        $result = json_decode($response);
        $moeda2 = $moeda2;
        return $result->rates->$moeda2 * $valor_converter;
    }

}
