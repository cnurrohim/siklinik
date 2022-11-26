<?php

/**
 * This is the model class for table "rekam_medik".
 *
 * The followings are the available columns in table 'rekam_medik':
 * @property integer $id
 * @property string $keluhan
 * @property string $diagnosis
 * @property integer $dokter_id
 * @property integer $pasien_id
 * @property integer $user_id
 * @property string $tanggal_periksa
 * @property string $terapi
 *
 * The followings are the available model relations:
 * @property Dokter $dokter
 * @property Pasien $pasien
 * @property Users $user
 * @property Resep[] $reseps
 */
class RekamMedik extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rekam_medik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keluhan, diagnosis, dokter_id, pasien_id, tanggal_periksa, terapi', 'required'),
			array('dokter_id, pasien_id, user_id', 'numerical', 'integerOnly'=>true),
			array('keluhan', 'length', 'max'=>255),
			array('diagnosis, terapi', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, keluhan, diagnosis, dokter_id, pasien_id, user_id, tanggal_periksa, terapi', 'safe', 'on'=>'search'),
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
			'dokter' => array(self::BELONGS_TO, 'Dokter', 'dokter_id'),
			'pasien' => array(self::BELONGS_TO, 'Pasien', 'pasien_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'reseps' => array(self::HAS_MANY, 'Resep', 'rekammedik_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'keluhan' => 'Keluhan',
			'diagnosis' => 'Diagnosis',
			'dokter_id' => 'Dokter',
			'pasien_id' => 'Pasien',
			'user_id' => 'User',
			'tanggal_periksa' => 'Tanggal Periksa',
			'terapi' => 'Terapi',
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
		$criteria->compare('keluhan',$this->keluhan,true);
		$criteria->compare('diagnosis',$this->diagnosis,true);
		$criteria->compare('dokter_id',$this->dokter_id);
		$criteria->compare('pasien_id',$this->pasien_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('tanggal_periksa',$this->tanggal_periksa,true);
		$criteria->compare('terapi',$this->terapi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RekamMedik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
