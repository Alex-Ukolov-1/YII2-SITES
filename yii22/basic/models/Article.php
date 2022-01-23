<?php

namespace app\models;

use app\models\ImageUpload;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property string|null $tags
 * @property string|null $date
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'content', 'tags'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'tags' => 'Tags',
            'date' => 'Date',
        ];
    }
    
    public function saveImage($filename)
    {

        $this->image=$filename;
        return $this->save(false);
        
    }
    public function getImage()
    {
        return($this->image)?'/uploads/'.$this->image:'/no-image.png';  
    }
}
