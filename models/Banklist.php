<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_list".
 *
 * @property int $id
 * @property string $bank
 * @property string $int_rate
 */
class Banklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank', 'int_rate'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank' => 'Bank',
            'int_rate' => 'Int Rate',
        ];
    }

    
}
