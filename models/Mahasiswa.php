<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $nim Nomor Induk Mahasiswa
 * @property string $nama Nama Mahasiswa
 * @property string $alamat Alamat Mahasiswa
 * @property string $kode_prodi Kode ProgramStudi
 *
 * @property Prodi $kodeProdi
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'nama', 'alamat', 'kode_prodi'], 'required'],
            [['nim', 'kode_prodi'], 'string', 'max' => 10],
            [['nama', 'alamat'], 'string', 'max' => 50],
            [['nim'], 'unique'],
            [['kode_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['kode_prodi' => 'kode_prodi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nomor Induk Mahasiswa',
            'nama' => 'Nama Mahasiswa',
            'alamat' => 'Alamat Mahasiswa',
            'kode_prodi' => 'Kode ProgramStudi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeProdi()
    {
        return $this->hasOne(Prodi::className(), ['kode_prodi' => 'kode_prodi']);
    }
}
