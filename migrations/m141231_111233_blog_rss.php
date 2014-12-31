<?php

use yii\db\Schema;
use yii\db\Migration;

class m141231_111233_blog_rss extends Migration
{
    public function up()
    {
    	$this->createTable(
    			'{{%blog_rss}}',
    			[
    					'userid' => Schema::TYPE_PK,
    					'hasscubscribed' => Schema::TYPE_BOOLEAN . ' NOT NULL', 
    					'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
    					'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
    			],
    			$tableOptions = ''
    	);
    	
    	// Indexes
    	$this->createIndex('id', '{{%blog_rss}}', 'userid');
    	
    	// Foreign Keys
    	$this->addForeignKey('FK_userId', '{{%blog_rss}}', 'userid', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    	
    	$this->insert('{{%blog_rss%}}', ['userid'=>2, 'hasscubscribed'=>1, 'created_at'=>1418005741, 'updated_at'=>1418005741]); 
    	$this->insert('{{%blog_rss%}}', ['userid'=>3, 'hasscubscribed'=>1, 'created_at'=>1418005741, 'updated_at'=>1418005741]);
    	
    	return true;  
    	
    }


    public function down()
    {
        $this->dropTable('{{%blog_rss}}'); 

        return true;
    }
}
