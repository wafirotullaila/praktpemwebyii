<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fakultas".
 *
 * @property int $id_fakultas
 * @property string $nama_fakultas
 *
 * @property Prodi[] $prodis
 * @property User[] $users
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fakultas', 'nama_fakultas'], 'required'],
            [['id_fakultas'], 'integer'],
            [['nama_fakultas'], 'string', 'max' => 50],
            [['id_fakultas'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fakultas' => 'Id Fakultas',
            'nama_fakultas' => 'Nama Fakultas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdis()
    {
        return $this->hasMany(Prodi::className(), ['id_fakultas' => 'id_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['fakultas' => 'id_fakultas']);
    }
}
