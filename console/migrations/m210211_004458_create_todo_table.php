<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%todo}}`.
 */
class m210211_004458_create_todo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%todo}}', [
            'id' => $this->primaryKey(),
            'value' => $this->string(50)->notNull(),
            'description' => $this->string()->notNull(),
            'status' => $this->boolean()->defaultValue(true),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-todo-user', 'todo', 'user_id', 'user', 'id', 'CASCADE');
        
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%todo}}');
    }
}
