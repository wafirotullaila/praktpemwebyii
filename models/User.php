<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $nama
 * @property int $universitas
 * @property int $fakultas
 * @property int $prodi
 * @property int $nim
 *
 * @property Fakultas $fakultas0
 * @property Prodi $prodi0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nama', 'universitas', 'fakultas', 'prodi', 'nim'], 'required'],
            [['id_user', 'universitas', 'fakultas', 'prodi', 'nim'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['universitas'], 'string', 'max' => 50],
            [['id_user'], 'unique'],
            [['fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::className(), 'targetAttribute' => ['fakultas' => 'id_fakultas']],
            [['prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['prodi' => 'id_prodi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'universitas' => 'Universitas',
            'fakultas' => 'Fakultas',
            'prodi' => 'Prodi',
            'nim' => 'Nim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas0()
    {
        return $this->hasOne(Fakultas::className(), ['id_fakultas' => 'fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdi0()
    {
        return $this->hasOne(Prodi::className(), ['id_prodi' => 'prodi']);
    }
}
