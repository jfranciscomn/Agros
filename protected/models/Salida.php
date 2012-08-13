<?php

/**
 * This is the model class for table "salida".
 *
 * The followings are the available columns in table 'salida':
 * @property integer $id
 * @property string $codigoSalida
 * @property string $fecha_f
 * @property integer $estatus_did
 * @property integer $temporada_did
 * @property integer $cliente_aid
 *
 * The followings are the available model relations:
 * @property Cliente $cliente
 * @property Estatus $estatus
 * @property Temporada $temporada
 * @property SalidaDetalle[] $salidaDetalles
 */
class Salida extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Salida the static model class
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
		return 'salida';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoSalida, fecha_f, estatus_did, temporada_did, cliente_aid', 'required'),
			array('estatus_did, temporada_did, cliente_aid', 'numerical', 'integerOnly'=>true),
			//array('estatus_did, temporada_did','dropdownfield'),
			//array('cliente_aid','autocompletefield'),
			array('codigoSalida', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigoSalida, fecha_f, estatus_did, temporada_did, cliente_aid', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_aid'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'temporada' => array(self::BELONGS_TO, 'Temporada', 'temporada_did'),
			'salidaDetalles' => array(self::HAS_MANY, 'SalidaDetalle', 'salida_did'),
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

		$this->delete();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigoSalida' => 'Codigo Salida',
			'fecha_f' => 'Fecha',
			'estatus_did' => 'Estatus',
			'temporada_did' => 'Temporada',
			'cliente_aid' => 'Cliente',
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
		$criteria->compare('codigoSalida',$this->codigoSalida,true);
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('temporada_did',$this->temporada_did);
		$criteria->compare('cliente_aid',$this->cliente_aid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
