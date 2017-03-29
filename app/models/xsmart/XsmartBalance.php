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
            'oid' => '订单号',
            'uid' => '充值人',
            'price' => '充值金额',
            'money' => '充值学币',
            'addtime' => '充值时间',
            'status' => '充值结果',
            'fintime' => '成功时间',
            'finished' => '充值完成',
            'paytype' => '支付方式',
            'user_ip' => 'ip',
            'pay_source' => '充值来源',
            'coid' => 'Coid',
            'pay_order_number' => 'Pay Order Number',
            'admin_id' => '系统充值人id',
        ];
    }
}
