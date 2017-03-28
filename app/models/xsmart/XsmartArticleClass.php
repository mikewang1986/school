<?php
namespace app\models\xsmart;
use app\models\EActiveRecord;
use Yii;
/**
 * This is the model class for table "xsmart_article_class".
 *
 * @property string $classid
 * @property string $classname
 * @property string $classurl
 * @property integer $parentid
 * @property string $parentpath
 * @property integer $depth
 * @property integer $rootid
 * @property integer $child
 * @property integer $previd
 * @property integer $nextid
 * @property integer $orderid
 * @property string $readme
 * @property string $elite
 * @property string $ontop
 * @property integer $Author
 * @property string $keyword
 * @property string $description
 * @property string $lmorder
 * @property string $uunique
 * @property string $pictureurl
 * @property string $statue
 * @property string $modelid
 */
class XsmartArticleClass extends EActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xsmart_article_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid', 'depth', 'rootid', 'child', 'previd', 'nextid', 'orderid', 'elite', 'ontop', 'Author', 'lmorder', 'statue', 'modelid'], 'integer'],
            [['readme', 'description'], 'string'],
            [['classname', 'parentpath'], 'string', 'max' => 50],
            [['classurl', 'keyword', 'pictureurl'], 'string', 'max' => 255],
            [['uunique'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classid' => 'Classid',
            'classname' => 'Classname',
            'classurl' => 'Classurl',
            'parentid' => 'Parentid',
            'parentpath' => 'Parentpath',
            'depth' => 'Depth',
            'rootid' => 'Rootid',
            'child' => 'Child',
            'previd' => 'Previd',
            'nextid' => 'Nextid',
            'orderid' => 'Orderid',
            'readme' => '栏目说明',
            'elite' => '推荐',
            'ontop' => '置顶',
            'Author' => '添加者id',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'lmorder' => 'Lmorder',
            'uunique' => 'Uunique',
            'pictureurl' => 'Pictureurl',
            'statue' => 'Statue',
            'modelid' => 'Modelid',
        ];
    }
}
