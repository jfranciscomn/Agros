<?php

/**
 * This is the model class for table "estatus".
 *
 * The followings are the available columns in table 'estatus':
 * @property integer $id
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property Beneficio[] $beneficios
 * @property BeneficioDetalle[] $beneficioDetalles
 * @property Calibre[] $calibres
 * @property Clasificacion[] $clasificacions
 * @property Cliente[] $clientes
 * @property Configuracion[] $configuracions
 * @property DatosFiscales[] $datosFiscales
 * @property Ejido[] $ejidos
 * @property Entrada[] $entradas
 * @property Estado[] $estados
 * @property Municipio[] $municipios
 * @property Precio[] $precios
 * @property Producto[] $productos
 * @property Salida[] $salidas
 * @property SalidaDetalle[] $salidaDetalles
 * @property SalidaDirecta[] $salidaDirectas
 * @property Servicio[] $servicios
 * @property Temporada[] $temporadas
 * @property TipoUsuario[] $tipoUsuarios
 * @property Unidad[] $unidads
 * @property Usuario[] $usuarios
 * @property Variedad[] $variedads
 */
class Estatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Estatus the static model class
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
		return 'estatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre', 'safe', 'on'=>'search'),
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
			'beneficios' => array(self::HAS_MANY, 'Beneficio', 'estatus_did'),
			'beneficioDetalles' => array(self::HAS_MANY, 'BeneficioDetalle', 'estatus_did'),
			'calibres' => array(self::HAS_MANY, 'Calibre', 'estatus_did'),
			'clasificacions' => array(self::HAS_MANY, 'Clasificacion', 'estatus_did'),
			'clientes' => array(self::HAS_MANY, 'Cliente', 'estatus_did'),
			'configuracions' => array(self::HAS_MANY, 'Configuracion', 'estatus_did'),
			'datosFiscales' => array(self::HAS_MANY, 'DatosFiscales', 'estaus_did'),
			'ejidos' => array(self::HAS_MANY, 'Ejido', 'estatus_did'),
			'entradas' => array(self::HAS_MANY, 'Entrada', 'estatus_did'),
			'estados' => array(self::HAS_MANY, 'Estado', 'estatus_did'),
			'municipios' => array(self::HAS_MANY, 'Municipio', 'estatus_did'),
			'precios' => array(self::HAS_MANY, 'Precio', 'estatus_did'),
			'productos' => array(self::HAS_MANY, 'Producto', 'estatus_did'),
			'salidas' => array(self::HAS_MANY, 'Salida', 'estatus_did'),
			'salidaDetalles' => array(self::HAS_MANY, 'SalidaDetalle', 'estatus_did'),
			'salidaDirectas' => array(self::HAS_MANY, 'SalidaDirecta', 'estatus_did'),
			'servicios' => array(self::HAS_MANY, 'Servicio', 'estatus_did'),
			'temporadas' => array(self::HAS_MANY, 'Temporada', 'estatus_did'),
			'tipoUsuarios' => array(self::HAS_MANY, 'TipoUsuario', 'estatus_did'),
			'unidads' => array(self::HAS_MANY, 'Unidad', 'estatus_did'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'estatus_did'),
			'variedads' => array(self::HAS_MANY, 'Variedad', 'estatus_did'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getActive()
	{
		$estatus = Estatus::model()->find(array('condition'=>'nombre=\'Activo\''));
		return $estatus;
	}
	
	public function getDeleting()
	{
		$estatus = Estatus::model()->find(array('condition'=>'nombre=\'Eliminando\''));
		return $estatus;
	}
}
