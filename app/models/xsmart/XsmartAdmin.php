<?php
namespace app\models\xsmart;
use app\models\EActiveRecord;
use Yii;
/**
 * This is the model class for table "xsmart_admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $cc_uid
 * @property string $pwd
 * @property string $email
 * @property integer $last_login_time
 * @property string $last_login_ip
 * @property integer $addtime
 * @property integer $group_id
 * @property integer $is_root
 */
class XsmartAdmin extends EActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xsmart_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cc_uid', 'last_login_time', 'addtime', 'group_id', 'is_root'], 'integer'],
            [['username', 'last_login_ip'], 'string', 'max' => 20],
            [['pwd'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'cc_uid' => 'Cc Uid',
            'pwd' => '密码',
            'email' => 'Email',
            'last_login_time' => '最后登录时间',
            'last_login_ip' => '最后登录IP',
            'addtime' => '加入的时间',
            'group_id' => '用户所属组',
            'is_root' => '是否拥有帐号管理权限',
        ];
    }
}
