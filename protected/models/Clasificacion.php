<?php

/**
 * This is the model class for table "clasificacion".
 *
 * The followings are the available columns in table 'clasificacion':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $producto_did
 * @property integer $variedad_did
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property BeneficioDetalle[] $beneficioDetalles
 * @property Estatus $estatus
 * @property Producto $producto
 * @property Variedad $variedad
 * @property SalidaDetalle[] $salidaDetalles
 */
class Clasificacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Clasificacion the static model class
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
		return 'clasificacion';
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
			//array('producto_did, variedad_did, estatus_did','dropdownfield'),
			array('nombre', 'length', 'max'=>145),
			array('descripcion', 'length', 'max'=>245),
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
			'beneficioDetalles' => array(self::HAS_MANY, 'BeneficioDetalle', 'clasificacion_aid'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_did'),
			'variedad' => array(self::BELONGS_TO, 'Variedad', 'variedad_did'),
			'salidaDetalles' => array(self::HAS_MANY, 'SalidaDetalle', 'clasificacion_did'),
		);
	}
	
	/**
	*
	**/
	public function attributeDatatypeRelation($attr)
	{
		$relations =$this->relations();
		foreach($relations as $nombre=>$relacion)
			if($relacion[2]===$attr)
				return $relacion[1];
		
		return null;
	}
	
	
	/**
	* elimina en cascada
	**/
	public function deleteCascade()
	{
		foreach ($this->beneficioDetalles as $beneficioDetallesn )
			$beneficioDetallesn->deleteCascade();

		foreach ($this->salidaDetalles as $salidaDetallesn )
			$salidaDetallesn->deleteCascade();

		$this->delete();
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
