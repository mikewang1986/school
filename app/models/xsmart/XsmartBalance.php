<?php

namespace app\models\xsmart;
use app\models\EActiveRecord;
use Yii;

/**
 * This is the model class for table "xsmart_balance".
 *
 * @property string $id
 * @property string $oid
 * @property integer $uid
 * @property double $price
 * @property double $money
 * @property integer $addtime
 * @property integer $status
 * @property integer $fintime
 * @property integer $finished
 * @property integer $paytype
 * @property string $user_ip
 * @property integer $pay_source
 * @property integer $coid
 * @property string $pay_order_number
 * @property integer $admin_id
 */
class XsmartBalance extends EActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xsmart_balance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oid', 'uid', 'price'], 'required'],
            [['uid', 'addtime', 'status', 'fintime', 'finished', 'paytype', 'pay_source', 'coid', 'admin_id'], 'integer'],
            [['price', 'money'], 'number'],
            [['oid', 'pay_order_number'], 'string', 'max' => 32],
            [['user_ip'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'oid' => 'Oid',
            'uid' => 'Uid',
            'price' => 'Price',
            'money' => 'Money',
            'addtime' => 'Addtime',
            'status' => 'Status',
            'fintime' => 'Fintime',
            'finished' => 'Finished',
            'paytype' => 'Paytype',
            'user_ip' => 'User Ip',
            'pay_source' => 'Pay Source',
            'coid' => 'Coid',
            'pay_order_number' => 'Pay Order Number',
            'admin_id' => 'Admin ID',
        ];
    }
}
