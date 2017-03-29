<?php
namespace app\models\xsmart;
use app\models\EActiveRecord;
use Yii;
/**
 * This is the model class for table "xsmart_ad".
 *
 * @property string $id
 * @property integer $bid
 * @property integer $classid
 * @property string $title
 * @property string $imgurl
 * @property string $http
 * @property string $description
 * @property string $times
 * @property integer $recommend
 * @property integer $audit
 * @property integer $top
 * @property integer $lmorder
 * @property integer $orid1
 * @property integer $orid2
 * @property string $content
 */
class XsmartAd extends EActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xsmart_ad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bid', 'classid', 'recommend', 'audit', 'top', 'lmorder', 'orid1', 'orid2'], 'integer'],
            [['times'], 'safe'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['imgurl', 'http'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 5000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bid' => '板块id',
            'classid' => '分类id',
            'title' => '标题',
            'imgurl' => '片图地址',
            'http' => '外链接地址',
            'description' => '简介',
            'times' => '发布时间',
            'recommend' => '推荐',
            'audit' => '审核',
            'top' => '置顶',
            'lmorder' => '排序',
            'orid1' => 'Orid1',
            'orid2' => 'Orid2',
            'content' => 'Content',
        ];
    }
}
