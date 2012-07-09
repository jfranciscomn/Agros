<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $fechaNacimiento_f
 * @property string $rfc
 * @property string $razonSocial
 * @property string $codigopostal
 * @property string $calle
 * @property string $colonia
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property integer $estado_did
 * @property integer $municipio_aid
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Estado $estado
 * @property Estatus $estatus
 * @property Municipio $municipio
 * @property Entrada[] $entradas
 * @property Salida[] $salidas
 */
class Cliente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cliente the static model class
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
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidos, fechaNacimiento_f, estado_did, municipio_aid, estatus_did', 'required'),
			array('estado_did, municipio_aid, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre, apellidos, razonSocial, calle, colonia, celular', 'length', 'max'=>145),
			array('rfc', 'length', 'max'=>13),
			array('codigopostal', 'length', 'max'=>10),
			array('telefono, email', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, apellidos, fechaNacimiento_f, rfc, razonSocial, codigopostal, calle, colonia, telefono, celular, email, estado_did, municipio_aid, estatus_did', 'safe', 'on'=>'search'),
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
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'municipio' => array(self::BELONGS_TO, 'Municipio', 'municipio_aid'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'cliente_aid'),
			'salidas' => array(self::HAS_MANY, 'Salida', 'cliente_aid'),
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
			'apellidos' => 'Apellidos',
			'fechaNacimiento_f' => 'Fecha Nacimiento F',
			'rfc' => 'Rfc',
			'razonSocial' => 'Razon Social',
			'codigopostal' => 'Codigopostal',
			'calle' => 'Calle',
			'colonia' => 'Colonia',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'email' => 'Email',
			'estado_did' => 'Estado',
			'municipio_aid' => 'Municipio',
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
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('fechaNacimiento_f',$this->fechaNacimiento_f,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('razonSocial',$this->razonSocial,true);
		$criteria->compare('codigopostal',$this->codigopostal,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('estado_did',$this->estado_did);
		$criteria->compare('municipio_aid',$this->municipio_aid);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}