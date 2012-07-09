<?php

/**
 * This is the model class for table "beneficio".
 *
 * The followings are the available columns in table 'beneficio':
 * @property integer $id
 * @property string $fecha_f
 * @property integer $entrada_aid
 * @property integer $estatus_did
 * @property integer $temporada_did
 *
 * The followings are the available model relations:
 * @property Temporada $temporada
 * @property Entrada $entrada
 * @property Estatus $estatus
 * @property BeneficioDetalle[] $beneficioDetalles
 */
class Beneficio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Beneficio the static model class
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
		return 'beneficio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_f, entrada_aid, estatus_did, temporada_did', 'required'),
			array('entrada_aid, estatus_did, temporada_did', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha_f, entrada_aid, estatus_did, temporada_did', 'safe', 'on'=>'search'),
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
			'temporada' => array(self::BELONGS_TO, 'Temporada', 'temporada_did'),
			'entrada' => array(self::BELONGS_TO, 'Entrada', 'entrada_aid'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'beneficioDetalles' => array(self::HAS_MANY, 'BeneficioDetalle', 'beneficio_aid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_f' => 'Fecha F',
			'entrada_aid' => 'Entrada',
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
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('entrada_aid',$this->entrada_aid);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('temporada_did',$this->temporada_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}