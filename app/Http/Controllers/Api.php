<?php

namespace App\Http\Controllers;

use App\Models\Info_Entrega;
use App\Models\Info_Peso;
use Illuminate\Http\Request;

class Api extends Controller
{
    private string $apiDistanceMatrix = "JipekBLIGXOvH7qdlfunvIYlfVH19";

    public function consultarValor(Request $request)// : array|null
    {
        $request->validate([
            'peso' => 'required',
            'cepOrigem' => 'required',
            'cepDestino' => 'required'
        ]);

        $peso = $request->peso;

        if($peso === 0) return null;

//      TODO Usar uma forma mais segura para eivitar erros como 0.1 + 0.2
        $valoresPeso = Info_peso::all();

        $valorEntrega = Info_Entrega::first();

        $response = json_decode(file_get_contents("https://api.distancematrix.ai/maps/api/distancematrix/json?origins={$request->cepOrigem}&destinations={$request->cepDestino}&key={$this->apiDistanceMatrix}"));

        if(!isset($response->rows[0]->elements[0]->distance->text)) return null;

        $data['distancia'] = [
            'text' => $response->rows[0]->elements[0]->distance->text,
            'valor' => $response->rows[0]->elements[0]->distance->value / 1000,
            'preco' => number_format(($response->rows[0]->elements[0]->distance->value / 1000) * $valorEntrega->valor_distancia, 2)
        ];

        $data['duracao'] = [
            'text' => $response->rows[0]->elements[0]->duration->text,
            'tempo' => $response->rows[0]->elements[0]->duration->value / 60,
            'valor' => number_format(($response->rows[0]->elements[0]->duration->value / 60) * $valorEntrega->valor_tempo_dislocamento, 2),
        ];

        foreach ($valoresPeso as $valor){
            if($peso >= intval($valor->min_peso) && $peso <= intval($valor->max_peso)){
                $data['valorPeso'] = number_format($valor->preco, 2);
            }
        }

        if(!isset($data['valorPeso'])) return null;

        $data['total'] = number_format($data['valorPeso'] + $data['distancia']['valor'] + $data['duracao']['valor'], 2);


        return $data;
    }

    public function getEndereco(Request $request)
    {
        $request->validate([
            'cep' => 'required',
        ]);

        $response = json_decode(file_get_contents("https://viacep.com.br/ws/{$request->cep}/json/?data=?"));

        return $response;
    }
}
