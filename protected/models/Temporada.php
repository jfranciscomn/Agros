<?php

/**
 * This is the model class for table "temporada".
 *
 * The followings are the available columns in table 'temporada':
 * @property integer $id
 * @property string $nombre
 * @property string $fechaIncial_f
 * @property string $fechaFinal_f
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Beneficio[] $beneficios
 * @property Configuracion[] $configuracions
 * @property Entrada[] $entradas
 * @property Precio[] $precios
 * @property Salida[] $salidas
 * @property SalidaDirecta[] $salidaDirectas
 * @property Estatus $estatus
 */
class Temporada extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Temporada the static model class
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
		return 'temporada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fechaIncial_f, estatus_did', 'required'),
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			//array('estatus_did','dropdownfield'),
			//array('fechaIncial_f, fechaFinal_f','datefield'),
			array('nombre', 'length', 'max'=>150),
			array('fechaFinal_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fechaIncial_f, fechaFinal_f, estatus_did', 'safe', 'on'=>'search'),
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
			'beneficios' => array(self::HAS_MANY, 'Beneficio', 'temporada_did'),
			'configuracions' => array(self::HAS_MANY, 'Configuracion', 'temporada_did'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'temporada_did'),
			'precios' => array(self::HAS_MANY, 'Precio', 'temporada_did'),
			'salidas' => array(self::HAS_MANY, 'Salida', 'temporada_did'),
			'salidaDirectas' => array(self::HAS_MANY, 'SalidaDirecta', 'temporada_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
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
		foreach ($this->$beneficios as $beneficiosn )
			$beneficiosn->deleteCascade();

		foreach ($this->$configuracions as $configuracionsn )
			$configuracionsn->deleteCascade();

		foreach ($this->$entradas as $entradasn )
			$entradasn->deleteCascade();

		foreach ($this->$precios as $preciosn )
			$preciosn->deleteCascade();

		foreach ($this->$salidas as $salidasn )
			$salidasn->deleteCascade();

		foreach ($this->$salidaDirectas as $salidaDirectasn )
			$salidaDirectasn->deleteCascade();

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
			'fechaIncial_f' => 'Fecha Incial',
			'fechaFinal_f' => 'Fecha Final',
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
		$criteria->compare('fechaIncial_f',$this->fechaIncial_f,true);
		$criteria->compare('fechaFinal_f',$this->fechaFinal_f,true);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public static function getActive()
	{
		$estatus = Estatus::getActive()->active;
		$configuracion=Configuracion::model()->find(array('condition'=>'estatus_did='.$estatus->id));
		return $configuracion->temporada;
	}
}
