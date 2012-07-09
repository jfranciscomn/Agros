<?php

/**
 * This is the model class for table "precio".
 *
 * The followings are the available columns in table 'precio':
 * @property integer $id
 * @property double $valor
 * @property integer $servicio_did
 * @property integer $estatus_did
 * @property integer $temporada_did
 *
 * The followings are the available model relations:
 * @property Servicio $servicio
 * @property Temporada $temporada
 * @property Estatus $estatus
 */
class Precio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Precio the static model class
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
		return 'precio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('valor, servicio_did, estatus_did, temporada_did', 'required'),
			array('servicio_did, estatus_did, temporada_did', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, valor, servicio_did, estatus_did, temporada_did', 'safe', 'on'=>'search'),
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
			'servicio' => array(self::BELONGS_TO, 'Servicio', 'servicio_did'),
			'temporada' => array(self::BELONGS_TO, 'Temporada', 'temporada_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'valor' => 'Valor',
			'servicio_did' => 'Servicio',
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
		$criteria->compare('valor',$this->valor);
		$criteria->compare('servicio_did',$this->servicio_did);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('temporada_did',$this->temporada_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}