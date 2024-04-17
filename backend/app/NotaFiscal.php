<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    protected $table = 'notas_fiscais';

    protected $fillable = ['chave', 'data_emissao', 'data_recebimento', 'cnpj'];

    public static function salvarNotaFiscal($dadosValidados)
    {
        $notaFiscal = new NotaFiscal($dadosValidados);
        $notaFiscal->save();
        return $notaFiscal;
    }
}
