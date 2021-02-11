<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property int $id
 * @property string $value
 * @property string $description
 * @property int|null $status
 * @property int $user_id
 *
 * @property User $user
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'description', 'user_id'], 'required'],
            [['status', 'user_id'], 'integer'],
            [['value'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'description' => 'Description',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
