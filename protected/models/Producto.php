<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id
 * @property string $nombre
 * @property integer $variedad
 * @property integer $clasificacion
 * @property integer $calibre
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Calibre[] $calibres
 * @property Clasificacion[] $clasificacions
 * @property Entrada[] $entradas
 * @property Estatus $estatus
 * @property SalidaDetalle[] $salidaDetalles
 * @property Variedad[] $variedads
 */
class Producto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Producto the static model class
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
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, variedad, clasificacion, calibre, estatus_did', 'required'),
			array('variedad, clasificacion, calibre, estatus_did', 'numerical', 'integerOnly'=>true),
			//array('estatus_did','dropdownfield'),
			array('nombre', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, variedad, clasificacion, calibre, estatus_did', 'safe', 'on'=>'search'),
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
			'calibres' => array(self::HAS_MANY, 'Calibre', 'producto_did'),
			'clasificacions' => array(self::HAS_MANY, 'Clasificacion', 'producto_did'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'producto_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'salidaDetalles' => array(self::HAS_MANY, 'SalidaDetalle', 'producto_did'),
			'variedads' => array(self::HAS_MANY, 'Variedad', 'producto_aid'),
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
		foreach ($this->salidaDetalles as $salidaDetallesn )
			$salidaDetallesn->deleteCascade();

		foreach ($this->entradas as $entradasn )
			$entradasn->deleteCascade();


			
		foreach ($this->calibres as $calibresn )
			$calibresn->deleteCascade();

		foreach ($this->clasificacions as $clasificacionsn )
			$clasificacionsn->deleteCascade();



		foreach ($this->variedads as $variedadsn )
			$variedadsn->deleteCascade();

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
			'variedad' => 'Variedad',
			'clasificacion' => 'Clasificacion',
			'calibre' => 'Calibre',
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
		$criteria->compare('variedad',$this->variedad);
		$criteria->compare('clasificacion',$this->clasificacion);
		$criteria->compare('calibre',$this->calibre);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
