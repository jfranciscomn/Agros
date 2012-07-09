<?php

/**
 * This is the model class for table "unidad".
 *
 * The followings are the available columns in table 'unidad':
 * @property integer $id
 * @property string $nombre
 * @property double $equivalencia
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property BeneficioDetalle[] $beneficioDetalles
 * @property Entrada[] $entradas
 * @property Estatus $estatus
 */
class Unidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Unidad the static model class
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
		return 'unidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, equivalencia, estatus_did', 'required'),
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			array('equivalencia', 'numerical'),
			array('nombre', 'length', 'max'=>145),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, equivalencia, estatus_did', 'safe', 'on'=>'search'),
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
			'beneficioDetalles' => array(self::HAS_MANY, 'BeneficioDetalle', 'unidad_did'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'unidad_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
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
			'equivalencia' => 'Equivalencia',
			'estatus_did' => 'Estatus',
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
		$criteria->compare('equivalencia',$this->equivalencia);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}