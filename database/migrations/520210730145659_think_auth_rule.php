<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class ThinkAuthRule extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('think_auth_rule', ['engine' => 'MyISAM', 'collation' => 'utf8_general_ci', 'comment' => '规则表' ,'id' => 'id','signed' => true ,'primary_key' => ['id']]);
        $table->addColumn('name', 'char', ['limit' => 80,'null' => false,'default' => '','signed' => true,'comment' => '规则唯一标识',])
			->addColumn('title', 'char', ['limit' => 20,'null' => false,'default' => '','signed' => true,'comment' => '规则中文名称',])
			->addColumn('status', 'boolean', ['null' => false,'default' => 1,'signed' => true,'comment' => '状态：为1正常，为0禁用',])
			->addColumn('type', 'boolean', ['null' => false,'default' => 1,'signed' => true,'comment' => '',])
			->addColumn('condition', 'char', ['limit' => 100,'null' => false,'default' => '','signed' => true,'comment' => '规则表达式，为空表示存在就验证，不为空表示按照条件验证',])
			->addIndex(['name'], ['unique' => true,'name' => 'name'])
            ->create();
    }
}
