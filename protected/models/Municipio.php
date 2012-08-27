<?php

/**
 * This is the model class for table "municipio".
 *
 * The followings are the available columns in table 'municipio':
 * @property integer $id
 * @property string $nombre
 * @property integer $estado_did
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 * @property Ejido[] $ejidos
 * @property Entrada[] $entradas
 * @property Estado $estado
 * @property Estatus $estatus
 */
class Municipio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Municipio the static model class
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
		return 'municipio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, estado_did, estatus_did', 'required'),
			array('estado_did, estatus_did', 'numerical', 'integerOnly'=>true),
			//array('estado_did, estatus_did','dropdownfield'),
			array('nombre', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, estado_did, estatus_did', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::HAS_MANY, 'Cliente', 'municipio_aid'),
			'ejidos' => array(self::HAS_MANY, 'Ejido', 'municipio_did'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'municipio_aid'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_did'),
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
		foreach ($this->clientes as $clientesn )
			$clientesn->deleteCascade();

		foreach ($this->ejidos as $ejidosn )
			$ejidosn->deleteCascade();

		foreach ($this->entradas as $entradasn )
			$entradasn->deleteCascade();

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
			'estado_did' => 'Estado',
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
		$criteria->compare('estado_did',$this->estado_did);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
