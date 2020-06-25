<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Float_;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'foto',
        'categoria_id',
        'publicado'
    ];
    public $rules = [
        'nome' => 'required|min:3|max:100',
        'descricao' => 'required|min:3|max:250',
        'preco' => 'required',
        'categoria_id' => 'required'
    ];

    public $customAttributes = [
        'nome' => 'Título',
        'descricao' => 'Descrição',
        'foto' => 'Foto',
        'preco' => 'Preço',
        'publicado' => 'Publicado',
        'categoria_id' => 'Categoria'
    ];


    // tratamentos

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->preco = str_replace('.','',$model->preco);
            $model->preco  = str_replace(',','.',$model->preco);
        });

        self::created(function($model){
            // ... code here
        });

        self::updating(function($model){
            $model->preco = str_replace('.','',$model->preco);
            $model->preco  = str_replace(',','.',$model->preco);
        });

        self::updated(function($model){
            // ... code here
        });

        self::deleting(function($model){
            // ... code here
        });

        self::deleted(function($model){
            // ... code here
        });
    }

    // relations

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne(Categoria::class,'id','categoria_id');
    }


}
