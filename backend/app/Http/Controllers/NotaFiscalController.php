<?php

namespace App\Http\Controllers;

use App\Models\NotaFiscal;
use App\NotaFiscal as AppNotaFiscal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotaFiscalController extends Controller
{
    public function store(Request $request)
    {
        // Validar os dados da requisição
        $request->validate([
            'chave' => 'required|string|min:44|max:44',
            'data_emissao' => 'required|date',
            'data_recebimento' => 'required|date',
            'cnpj' => 'required|string|size:14',
        ]);

        // Verificar se a nota fiscal possui CNPJ da Madeira
        if ($request->cnpj !== '00000000000000') { // Supondo que o CNPJ da Madeira seja 00000000000000
            Log::info('Tentativa de inserção de nota fiscal com CNPJ inválido: ' . $request->cnpj);
            return response()->json(['error' => 'CNPJ inválido'], 400);
        }


        // Criar a nota fiscal
        $notaFiscal = AppNotaFiscal::create($request->all());

        return response()->json($notaFiscal, 201);
    }

    public function show($chave)
    {
        $notaFiscal = AppNotaFiscal::where('chave', $chave)->first();

        if (!$notaFiscal) {
            return response()->json(['error' => 'Nota fiscal não encontrada'], 404);
        }

        return response()->json($notaFiscal);
    }
}
