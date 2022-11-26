<?php

/**
 * This is the model class for table "bayar".
 *
 * The followings are the available columns in table 'bayar':
 * @property integer $id
 * @property integer $resep_id
 * @property string $biaya_obat
 * @property string $biaya_jasa
 * @property string $bayar
 * @property string $tanggal
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Resep $resep
 * @property Users $user
 */
class Bayar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bayar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('biaya_obat, biaya_jasa', 'required'),
			array('resep_id, user_id', 'numerical', 'integerOnly'=>true),
			array('biaya_obat, biaya_jasa, bayar', 'length', 'max'=>10),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, resep_id, biaya_obat, biaya_jasa, bayar, tanggal, user_id', 'safe', 'on'=>'search'),
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
			'resep' => array(self::BELONGS_TO, 'Resep', 'resep_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'rekamMedik' => array(self::HAS_ONE, 'rekamMedik', 'rekammedik_id', 'through'=>'resep'),
			'dokter' => array(self::HAS_ONE, 'dokter', 'dokter_id', 'through'=>'rekamMedik'),
			'pasien' => array(self::HAS_ONE, 'pasien', 'pasien_id', 'through'=>'rekamMedik'),
			'detilResep' => array(self::HAS_MANY, 'detilResep', 'resep_id'),
			'obat' => array(self::HAS_MANY, 'obat', 'obat_id', 'through'=>'detilResep'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'resep_id' => 'Resep',
			'biaya_obat' => 'Biaya Obat',
			'biaya_jasa' => 'Biaya Jasa',
			'bayar' => 'Bayar',
			'tanggal' => 'Tanggal',
			'user_id' => 'User',
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
		$criteria->compare('resep_id',$this->resep_id);
		$criteria->compare('biaya_obat',$this->biaya_obat,true);
		$criteria->compare('biaya_jasa',$this->biaya_jasa,true);
		$criteria->compare('bayar',$this->bayar,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bayar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
