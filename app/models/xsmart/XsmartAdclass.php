<?php
namespace app\models\xsmart;
use app\models\EActiveRecord;
use Yii;
/**
 * This is the model class for table "xsmart_adclass".
 *
 * @property integer $classid
 * @property integer $bid
 * @property integer $parentid
 * @property string $classname
 * @property string $uunique
 * @property string $lmorder
 * @property string $classurl
 * @property string $readme
 * @property string $keyword
 * @property string $description
 */
class XsmartAdclass extends EActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xsmart_adclass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bid', 'parentid', 'classname'], 'required'],
            [['bid', 'parentid', 'lmorder'], 'integer'],
            [['classname'], 'string', 'max' => 100],
            [['uunique', 'classurl'], 'string', 'max' => 150],
            [['readme', 'keyword', 'description'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classid' => 'Classid',
            'bid' => 'Bid',
            'parentid' => 'Parentid',
            'classname' => 'Classname',
            'uunique' => 'Uunique',
            'lmorder' => 'Lmorder',
            'classurl' => 'Classurl',
            'readme' => 'Readme',
            'keyword' => 'Keyword',
            'description' => 'Description',
        ];
    }
}
