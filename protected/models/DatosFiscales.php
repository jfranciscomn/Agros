<?php

/**
 * This is the model class for table "datosFiscales".
 *
 * The followings are the available columns in table 'datosFiscales':
 * @property integer $id
 * @property string $nombre
 * @property double $valor
 * @property integer $estaus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estaus
 */
class DatosFiscales extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DatosFiscales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datosFiscales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, valor, estaus_did', 'required'),
			array('estaus_did', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('nombre', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, valor, estaus_did', 'safe', 'on'=>'search'),
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
			'estaus' => array(self::BELONGS_TO, 'Estatus', 'estaus_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'valor' => 'Valor',
			'estaus_did' => 'Estaus',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('estaus_did',$this->estaus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}