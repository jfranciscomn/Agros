<?php

/**
 * This is the model class for table "salidaDirecta".
 *
 * The followings are the available columns in table 'salidaDirecta':
 * @property integer $id
 * @property string $codigoSalida
 * @property string $fecha_f
 * @property integer $entrada_aid
 * @property double $cantidad
 * @property integer $estatus_did
 * @property integer $temporada_did
 *
 * The followings are the available model relations:
 * @property Entrada $entrada
 * @property Estatus $estatus
 * @property Temporada $temporada
 */
class SalidaDirecta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SalidaDirecta the static model class
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
		return 'salidaDirecta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoSalida, fecha_f, entrada_aid, cantidad, estatus_did, temporada_did, unidad_did', 'required'),
			array('entrada_aid, estatus_did, temporada_did, unidad_did', 'numerical', 'integerOnly'=>true),
			array('cantidad', 'numerical'),
			//array('estatus_did, temporada_did','dropdownfield'),
			//array('entrada_aid','autocompletefield'),
			array('codigoSalida', 'length', 'max'=>254),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigoSalida, fecha_f, entrada_aid, cantidad, estatus_did, temporada_did, unidad_did', 'safe', 'on'=>'search'),
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
			'unidad' => array(self::BELONGS_TO, 'Unidad', 'unidad_did'),
			'entrada' => array(self::BELONGS_TO, 'Entrada', 'entrada_aid'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'temporada' => array(self::BELONGS_TO, 'Temporada', 'temporada_did'),
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
		$this->delete();
	}
	
	public function save()
	{
		$ret=parent::save();
		
		if($ret){
			$entrada=$this->entrada;
			$entrada->saldo =$entrada->saldo - Unidad::conversion($this->cantidad,$this->unidad,$entrada->unidad);
			$entrada->save();
		}
		return $ret;

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
			'entrada_aid' => 'Entrada',
			'cantidad' => 'Cantidad',
			'estatus_did' => 'Estatus',
			'temporada_did' => 'Temporada',
			'unidad_did' => 'Unidad',
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
		$criteria->compare('entrada_aid',$this->entrada_aid);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('temporada_did',$this->temporada_did);
		$criteria->compare('unidad_did',$this->unidad_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
