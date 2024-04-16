<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    public function getStatus()
    {
        // Exemplo: retornar o status com base na data de recebimento
        if ($this->data_recebimento) {
            return 'Recebida';
        } else {
            return 'Pendente';
        }
    }
}
