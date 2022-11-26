<?php

/**
 * This is the model class for table "dokter".
 *
 * The followings are the available columns in table 'dokter':
 * @property integer $id
 * @property string $nama
 * @property string $hp
 * @property string $tgllahir
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property integer $kota_id
 *
 * The followings are the available model relations:
 * @property Kota $kota
 * @property RekamMedik[] $rekamMediks
 */
class Dokter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dokter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, hp, kota_id', 'required'),
			array('kota_id', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>100),
			array('hp', 'length', 'max'=>30),
			array('alamat', 'length', 'max'=>255),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('tgllahir', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, hp, tgllahir, alamat, jenis_kelamin, kota_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'kota' => array(self::BELONGS_TO, 'Kota', 'kota_id'),
			'rekamMediks' => array(self::HAS_MANY, 'RekamMedik', 'dokter_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'hp' => 'Hp',
			'tgllahir' => 'Tgllahir',
			'alamat' => 'Alamat',
			'jenis_kelamin' => 'Jenis Kelamin',
			'kota_id' => 'Kota',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('tgllahir',$this->tgllahir,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('kota_id',$this->kota_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dokter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
