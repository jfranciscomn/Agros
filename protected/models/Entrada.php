<?php

/**
 * This is the model class for table "entrada".
 *
 * The followings are the available columns in table 'entrada':
 * @property integer $id
 * @property integer $codigo
 * @property string $fecha_f
 * @property string $cosecha
 * @property string $camion
 * @property string $marca
 * @property string $modelo
 * @property string $placas
 * @property string $conductor
 * @property double $pesoBruto
 * @property double $taraCamion
 * @property double $pesoNeto
 * @property double $impuresas
 * @property double $pesoNetoAnalizado
 * @property integer $cliente_aid
 * @property integer $producto_did
 * @property integer $variedad_aid
 * @property integer $unidad_did
 * @property integer $estado_did
 * @property integer $municipio_aid
 * @property integer $ejido_did
 * @property integer $estatus_did
 * @property integer $temporada_did
 *
 * The followings are the available model relations:
 * @property Beneficio[] $beneficios
 * @property Temporada $temporada
 * @property Cliente $cliente
 * @property Ejido $ejido
 * @property Estado $estado
 * @property Estatus $estatus
 * @property Municipio $municipio
 * @property Producto $producto
 * @property Unidad $unidad
 * @property Variedad $variedad
 * @property SalidaDirecta[] $salidaDirectas
 */
class Entrada extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Entrada the static model class
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
		return 'entrada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, fecha_f, pesoBruto, taraCamion, pesoNeto, impuresas, pesoNetoAnalizado, cliente_aid, producto_did, variedad_aid, unidad_did, estado_did, municipio_aid, ejido_did, estatus_did, temporada_did', 'required'),
			array('codigo, cliente_aid, producto_did, variedad_aid, unidad_did, estado_did, municipio_aid, ejido_did, estatus_did, temporada_did', 'numerical', 'integerOnly'=>true),
			array('pesoBruto, taraCamion, pesoNeto, impuresas, pesoNetoAnalizado', 'numerical'),
			array('cosecha, camion, marca, modelo, placas, conductor', 'length', 'max'=>145),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigo, fecha_f, cosecha, camion, marca, modelo, placas, conductor, pesoBruto, taraCamion, pesoNeto, impuresas, pesoNetoAnalizado, cliente_aid, producto_did, variedad_aid, unidad_did, estado_did, municipio_aid, ejido_did, estatus_did, temporada_did', 'safe', 'on'=>'search'),
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
			'beneficios' => array(self::HAS_MANY, 'Beneficio', 'entrada_aid'),
			'temporada' => array(self::BELONGS_TO, 'Temporada', 'temporada_did'),
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_aid'),
			'ejido' => array(self::BELONGS_TO, 'Ejido', 'ejido_did'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'municipio' => array(self::BELONGS_TO, 'Municipio', 'municipio_aid'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_did'),
			'unidad' => array(self::BELONGS_TO, 'Unidad', 'unidad_did'),
			'variedad' => array(self::BELONGS_TO, 'Variedad', 'variedad_aid'),
			'salidaDirectas' => array(self::HAS_MANY, 'SalidaDirecta', 'entrada_aid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigo' => 'Codigo',
			'fecha_f' => 'Fecha F',
			'cosecha' => 'Cosecha',
			'camion' => 'Camion',
			'marca' => 'Marca',
			'modelo' => 'Modelo',
			'placas' => 'Placas',
			'conductor' => 'Conductor',
			'pesoBruto' => 'Peso Bruto',
			'taraCamion' => 'Tara Camion',
			'pesoNeto' => 'Peso Neto',
			'impuresas' => 'Impuresas',
			'pesoNetoAnalizado' => 'Peso Neto Analizado',
			'cliente_aid' => 'Cliente',
			'producto_did' => 'Producto',
			'variedad_aid' => 'Variedad',
			'unidad_did' => 'Unidad',
			'estado_did' => 'Estado',
			'municipio_aid' => 'Municipio',
			'ejido_did' => 'Ejido',
			'estatus_did' => 'Estatus',
			'temporada_did' => 'Temporada',
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
		$criteria->compare('codigo',$this->codigo);
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('cosecha',$this->cosecha,true);
		$criteria->compare('camion',$this->camion,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('placas',$this->placas,true);
		$criteria->compare('conductor',$this->conductor,true);
		$criteria->compare('pesoBruto',$this->pesoBruto);
		$criteria->compare('taraCamion',$this->taraCamion);
		$criteria->compare('pesoNeto',$this->pesoNeto);
		$criteria->compare('impuresas',$this->impuresas);
		$criteria->compare('pesoNetoAnalizado',$this->pesoNetoAnalizado);
		$criteria->compare('cliente_aid',$this->cliente_aid);
		$criteria->compare('producto_did',$this->producto_did);
		$criteria->compare('variedad_aid',$this->variedad_aid);
		$criteria->compare('unidad_did',$this->unidad_did);
		$criteria->compare('estado_did',$this->estado_did);
		$criteria->compare('municipio_aid',$this->municipio_aid);
		$criteria->compare('ejido_did',$this->ejido_did);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('temporada_did',$this->temporada_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}