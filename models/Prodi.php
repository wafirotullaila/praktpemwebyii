<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prodi".
 *
 * @property string $kode_prodi Kode Program Studi
 * @property string $nama_prodi Nama Program Studi
 * @property string $alamat_prodi Alamat Program Studi
 * @property string $nip_kaprodi NIP Kepala Program Studi
 *
 * @property Mahasiswa[] $mahasiswas
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_prodi', 'nama_prodi', 'alamat_prodi', 'nip_kaprodi'], 'required'],
            [['kode_prodi', 'nama_prodi', 'nip_kaprodi'], 'string', 'max' => 20],
            [['alamat_prodi'], 'string', 'max' => 50],
            [['kode_prodi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_prodi' => 'Kode Program Studi',
            'nama_prodi' => 'Nama Program Studi',
            'alamat_prodi' => 'Alamat Program Studi',
            'nip_kaprodi' => 'NIP Kepala Program Studi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['kode_prodi' => 'kode_prodi']);
    }
}
