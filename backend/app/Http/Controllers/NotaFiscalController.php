<?php

namespace App\Http\Controllers;
use App\Models\NotaFiscal;
use Illuminate\Http\Request;

class NotaFiscalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'chave' => 'required|unique:notas_fiscais|digits:44',
            'data_emissao' => 'required|date',
            'data_recebimento' => 'required|date',
            'cnpj' => 'required|digits:14',
        ]);

        $notaFiscal = NotaFiscal::create($request->all());

        return response()->json($notaFiscal, 201);
    }

    public function show($chave)
    {
        $notaFiscal = NotaFiscal::where('chave', $chave)->first();

        if (!$notaFiscal) {
            return response()->json(['error' => 'Nota fiscal não encontrada.'], 404);
        }

        return response()->json($notaFiscal, 200);
    }
}
