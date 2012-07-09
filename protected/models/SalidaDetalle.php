<?php

/**
 * This is the model class for table "salidaDetalle".
 *
 * The followings are the available columns in table 'salidaDetalle':
 * @property integer $id
 * @property double $cantidad
 * @property integer $producto_did
 * @property integer $variedad_did
 * @property integer $clasificacion_did
 * @property integer $calibre_did
 * @property integer $salida_did
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Salida $salida
 * @property Calibre $calibre
 * @property Clasificacion $clasificacion
 * @property Variedad $variedad
 * @property Producto $producto
 */
class SalidaDetalle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SalidaDetalle the static model class
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
		return 'salidaDetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, producto_did, variedad_did, salida_did, estatus_did', 'required'),
			array('producto_did, variedad_did, clasificacion_did, calibre_did, salida_did, estatus_did', 'numerical', 'integerOnly'=>true),
			array('cantidad', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cantidad, producto_did, variedad_did, clasificacion_did, calibre_did, salida_did, estatus_did', 'safe', 'on'=>'search'),
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
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'salida' => array(self::BELONGS_TO, 'Salida', 'salida_did'),
			'calibre' => array(self::BELONGS_TO, 'Calibre', 'calibre_did'),
			'clasificacion' => array(self::BELONGS_TO, 'Clasificacion', 'clasificacion_did'),
			'variedad' => array(self::BELONGS_TO, 'Variedad', 'variedad_did'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cantidad' => 'Cantidad',
			'producto_did' => 'Producto',
			'variedad_did' => 'Variedad',
			'clasificacion_did' => 'Clasificacion',
			'calibre_did' => 'Calibre',
			'salida_did' => 'Salida',
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
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('producto_did',$this->producto_did);
		$criteria->compare('variedad_did',$this->variedad_did);
		$criteria->compare('clasificacion_did',$this->clasificacion_did);
		$criteria->compare('calibre_did',$this->calibre_did);
		$criteria->compare('salida_did',$this->salida_did);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}