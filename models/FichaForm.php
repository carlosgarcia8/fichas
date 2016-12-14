<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class FichaForm extends Model
{
    public $titulo;
    public $nombre;

    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo'], 'string', 'max' => 50],
            [['nombre'], 'string', 'max' => 100],
            [['nombre'], 'exist',
                'skipOnError' => true,
                'targetClass' => Persona::className(),
                'filter' => ['ilike', 'nombre', 'nombre'],
            ],
            [['titulo'], 'exist',
                'skipOnError' => true,
                'targetClass' => Ficha::className(),
                'filter' => ['ilike','titulo', 'titulo'],
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'titulo' => 'Titulo de la película',
            'nombre' => 'Nombre del actor/actriz',
        ];
    }
}
