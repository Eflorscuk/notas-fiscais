<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    use HasFactory;

    protected $fillable = ['chave', 'data_emissao', 'data_recebimento', 'cnpj'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($notaFiscal){
            if(!$notaFiscal->validateCnpj()) {
                // Log para a console
                \Log::info('Tentativa de inserção de nota fiscal com CNPJ inválido.');
                return false;
            }
        });
    }

    public function validateCnpj()
    {
        // Simulando a validação do CNPJ da Madeira
        $cnpjMadeira = '12345678000199'; // CNPJ da Madeira fictício

        return $this->cnpj === $cnpjMadeira;
    }

    public static function validateData($data)
    {
        // Validar se a data está no formato correto
        return \DateTime::createFromFormat('Y-m-d', $data) !== false;
    }
}
