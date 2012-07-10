<?php

/**
 * This is the model class for table "variedad".
 *
 * The followings are the available columns in table 'variedad':
 * @property integer $id
 * @property string $nombre
 * @property integer $producto_aid
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Calibre[] $calibres
 * @property Clasificacion[] $clasificacions
 * @property Entrada[] $entradas
 * @property SalidaDetalle[] $salidaDetalles
 * @property Producto $producto
 * @property Estatus $estatus
 */
class Variedad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Variedad the static model class
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
		return 'variedad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, producto_aid, estatus_did', 'required'),
			array('producto_aid, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>145),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, producto_aid, estatus_did', 'safe', 'on'=>'search'),
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
			'calibres' => array(self::HAS_MANY, 'Calibre', 'variedad_aid'),
			'clasificacions' => array(self::HAS_MANY, 'Clasificacion', 'variedad_aid'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'variedad_aid'),
			'salidaDetalles' => array(self::HAS_MANY, 'SalidaDetalle', 'variedad_did'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_aid'),
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
			'producto_aid' => 'Producto',
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
		$criteria->compare('producto_aid',$this->producto_aid);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}