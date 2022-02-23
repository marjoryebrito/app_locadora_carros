<?php

namespace App\Models;

use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'imagem'];

    public function rules(){

        $regras = [
            'nome' => 'required|unique:marcas,nome,'.$this->id,
            'imagem' => 'required|file|mimes:png,jpg,jpeg'
        ];

        return $regras;

    }

    public function feedback(){

        $f = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.unique' => 'O nome da marca já existe.',
            'imagem.mimes' => 'Tipo de arquivo inválido.'
        ];

        return $f;

    }

    public function modelos(){
       return $this->hasMany('App\Models\Modelo');
       // $this->hasMany(Modelo::class, 'marca_id');
    }
}
