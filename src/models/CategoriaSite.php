<?php

namespace app\src\models;

use Yii;

/**
 * This is the model class for table "categoria_site".
 *
 * @property int $id
 * @property string $categoria
 * @property string $conteudo
 */
class CategoriaSite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_site';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria', 'conteudo'], 'required'],
            [['conteudo'], 'string'],
            [['categoria'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'conteudo' => 'Conteudo',
        ];
    }
}
