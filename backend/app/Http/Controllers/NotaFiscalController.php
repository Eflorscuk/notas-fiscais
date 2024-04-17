<?php

namespace App\Http\Controllers;

//use App\Models\NotaFiscal;
use App\NotaFiscal as AppNotaFiscal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class NotaFiscalController extends Controller
{
    public function store(Request $request)
    {
        try {
            $dadosValidados = $request->validate([
                'chave' => 'required|string|size:44',
                'data_emissao' => 'required|date',
                'data_recebimento' => 'required|date',
                'cnpj' => 'required|string|size:14',
            ]);
            $data = ['cnpj' => $request->cnpj];
            $cnpjValido = $this->validaCnpj($data);

            if(!$cnpjValido){
                return response()->json(['error' => "CNPJ não válido"], 400);
            }

            if($dadosValidados && $cnpjValido){
                $notaFiscal = AppNotaFiscal::salvarNotaFiscal($dadosValidados);
                dd($notaFiscal);
                return response()->json($notaFiscal, 201);
            }

        } catch (ValidationException $e) {
            $errors = $e->errors();
            return response()->json(['error' => $errors ], 400);
        }
    }

    public function validaCnpj($data)
    {
        try {
            $cnpj = $data['cnpj'];
            $response = Http::get('http://verificador:3000/valida/' . $cnpj);

            if($response->successful()){
                $conteudo = $response->body();
                return response()->json(['cnpj-valido' => $conteudo]);
            } else {
                $statusCode = $response->status();
                return response()->json(['error' => 'Erro ao acessar a URL', 'status' => $statusCode]);
            }


        } catch (ValidationException $e) {
            $errors = $e->errors();
            return response()->json(['error' => $errors ], 400);
        }
    }

    public function show($chave)
    {
        $notaFiscal = AppNotaFiscal::where('chave', $chave)->get();

        if (!$notaFiscal) {
            return response()->json(['error' => 'Nota fiscal não encontrada'], 404);
        }

        return response()->json($notaFiscal);
    }
}
