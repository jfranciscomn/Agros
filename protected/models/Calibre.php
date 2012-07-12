<?php

/**
 * This is the model class for table "calibre".
 *
 * The followings are the available columns in table 'calibre':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $producto_did
 * @property integer $variedad_did
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property BeneficioDetalle[] $beneficioDetalles
 * @property Producto $producto
 * @property Variedad $variedad
 * @property Estatus $estatus
 * @property SalidaDetalle[] $salidaDetalles
 */
class Calibre extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Calibre the static model class
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
		return 'calibre';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, producto_did, variedad_did, estatus_did', 'required'),
			array('producto_did, variedad_did, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>150),
			array('descripcion', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, producto_did, variedad_did, estatus_did', 'safe', 'on'=>'search'),
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
			'beneficioDetalles' => array(self::HAS_MANY, 'BeneficioDetalle', 'calibre_aid'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_did'),
			'variedad' => array(self::BELONGS_TO, 'Variedad', 'variedad_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'salidaDetalles' => array(self::HAS_MANY, 'SalidaDetalle', 'calibre_did'),
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
			'descripcion' => 'Descripcion',
			'producto_did' => 'Producto',
			'variedad_did' => 'Variedad',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('producto_did',$this->producto_did);
		$criteria->compare('variedad_did',$this->variedad_did);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}