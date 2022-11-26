<?php

/**
 * This is the model class for table "resep".
 *
 * The followings are the available columns in table 'resep':
 * @property integer $id
 * @property integer $rekammedik_id
 * @property string $tanggal
 *
 * The followings are the available model relations:
 * @property Bayar[] $bayars
 * @property DetilResep[] $detilReseps
 * @property RekamMedik $rekammedik
 */
class Resep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rekammedik_id, tanggal', 'required'),
			array('rekammedik_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rekammedik_id, tanggal', 'safe', 'on'=>'search'),
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
			'bayars' => array(self::HAS_MANY, 'Bayar', 'resep_id'),
			'detilReseps' => array(self::HAS_MANY, 'DetilResep', 'resep_id'),
			'rekammedik' => array(self::BELONGS_TO, 'RekamMedik', 'rekammedik_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rekammedik_id' => 'Rekammedik',
			'tanggal' => 'Tanggal',
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
		$criteria->compare('rekammedik_id',$this->rekammedik_id);
		$criteria->compare('tanggal',$this->tanggal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
