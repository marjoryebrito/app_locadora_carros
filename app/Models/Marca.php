<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'imagem'];

    public function rules(){

        $regras = [
            'nome' => 'required|unique:marcas,nome,'.$this->id,
            'imagem' => 'required'
        ];

        return $regras;

    }

    public function feedback(){

        $f = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.unique' => 'O nome da marca já existe.'
        ];

        return $f;

    }
}
