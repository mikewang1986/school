<?php

namespace app\models\xsmart;
use app\models\EActiveRecord;
use Yii;
/**
 * This is the model class for table "xsmart_admin_group".
 *
 * @property integer $gid
 * @property integer $parent_id
 * @property string $group_name
 * @property string $permissions
 * @property string $desc
 * @property integer $websiteid
 * @property string $create_user
 * @property integer $group_count
 * @property string $group_info
 * @property integer $add_time
 * @property string $type
 * @property string $type_id
 */
class XsmartAdminGroup extends EActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xsmart_admin_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'websiteid', 'group_count', 'add_time'], 'integer'],
            [['permissions'], 'string'],
            [['group_name', 'type'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 45],
            [['create_user'], 'string', 'max' => 100],
            [['group_info'], 'string', 'max' => 255],
            [['type_id'], 'string', 'max' => 36]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'parent_id' => 'Parent ID',
            'group_name' => 'Group Name',
            'permissions' => 'Permissions',
            'desc' => 'Desc',
            'websiteid' => 'Websiteid',
            'create_user' => 'Create User',
            'group_count' => 'Group Count',
            'group_info' => 'Group Info',
            'add_time' => 'Add Time',
            'type' => 'Type',
            'type_id' => 'Type ID',
        ];
    }
}
