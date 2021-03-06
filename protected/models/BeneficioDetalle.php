<?php

/**
 * This is the model class for table "beneficioDetalle".
 *
 * The followings are the available columns in table 'beneficioDetalle':
 * @property integer $id
 * @property double $cantidad
 * @property double $saldo
 * @property integer $clasificacion_aid
 * @property integer $calibre_aid
 * @property integer $unidad_did
 * @property integer $beneficio_aid
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Calibre $calibre
 * @property Clasificacion $clasificacion
 * @property Unidad $unidad
 * @property Beneficio $beneficio
 * @property Estatus $estatus
 */
class BeneficioDetalle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BeneficioDetalle the static model class
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
		return 'beneficioDetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, saldo, unidad_did, beneficio_aid, estatus_did', 'required'),
			array('clasificacion_aid, calibre_aid, unidad_did, beneficio_aid, estatus_did', 'numerical', 'integerOnly'=>true),
			array('cantidad, saldo', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cantidad, saldo, clasificacion_aid, calibre_aid, unidad_did, beneficio_aid, estatus_did', 'safe', 'on'=>'search'),
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
			'calibre' => array(self::BELONGS_TO, 'Calibre', 'calibre_aid'),
			'clasificacion' => array(self::BELONGS_TO, 'Clasificacion', 'clasificacion_aid'),
			'unidad' => array(self::BELONGS_TO, 'Unidad', 'unidad_did'),
			'beneficio' => array(self::BELONGS_TO, 'Beneficio', 'beneficio_aid'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
		);
	}
	
	public function save()
	{
		$ret=parent::save();
		
		if($ret){
			$entrada=$this->beneficio->entrada;
			$entrada->saldo =$entrada->saldo - Unidad::conversion($this->cantidad,$this->unidad,$entrada->unidad);
			$entrada->save();
		}
		return $ret;

	}
	
	public function deleteCascade()
	{
		$entrada=$this->beneficio->entrada;
		$entrada->saldo =$entrada->saldo + Unidad::conversion($this->cantidad,$this->unidad,$entrada->unidad);
		$entrada->save();
		$this->delete();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cantidad' => 'Cantidad',
			'saldo' => 'Saldo',
			'clasificacion_aid' => 'Clasificacion',
			'calibre_aid' => 'Calibre',
			'unidad_did' => 'Unidad',
			'beneficio_aid' => 'Beneficio',
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
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('saldo',$this->saldo);
		$criteria->compare('clasificacion_aid',$this->clasificacion_aid);
		$criteria->compare('calibre_aid',$this->calibre_aid);
		$criteria->compare('unidad_did',$this->unidad_did);
		$criteria->compare('beneficio_aid',$this->beneficio_aid);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
