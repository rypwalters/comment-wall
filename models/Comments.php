<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $name
 * @property string $comments
 * @property string $email
 * @property string $website
 * @property string $date_created
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'website', 'date_created'], 'required'],
            [['date_created'], 'safe'],
            [['name'], 'string', 'max' => 80],
            [['comments'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 45],
            [['website'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'comments' => 'Comments',
            'email' => 'Email',
            'website' => 'Website',
            'date_created' => 'Date Created',
        ];
    }
}
