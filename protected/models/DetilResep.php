<?php

/**
 * This is the model class for table "detil_resep".
 *
 * The followings are the available columns in table 'detil_resep':
 * @property integer $id
 * @property integer $obat_id
 * @property integer $resep_id
 * @property integer $jumlah
 * @property string $harga
 *
 * The followings are the available model relations:
 * @property Obat $obat
 * @property Resep $resep
 */
class DetilResep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detil_resep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('harga', 'required'),
			array('obat_id, resep_id, jumlah', 'numerical', 'integerOnly'=>true),
			array('harga', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, obat_id, resep_id, jumlah, harga', 'safe', 'on'=>'search'),
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
			'obat' => array(self::BELONGS_TO, 'Obat', 'obat_id'),
			'resep' => array(self::BELONGS_TO, 'Resep', 'resep_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'obat_id' => 'Obat',
			'resep_id' => 'Resep',
			'jumlah' => 'Jumlah',
			'harga' => 'Harga',
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
		$criteria->compare('obat_id',$this->obat_id);
		$criteria->compare('resep_id',$this->resep_id);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('harga',$this->harga,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetilResep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTotal($provider){
		$total=0;

		foreach($provider as $item)
			$total+=$item->jumlah * $item->harga;

		return $total;
	}
}
