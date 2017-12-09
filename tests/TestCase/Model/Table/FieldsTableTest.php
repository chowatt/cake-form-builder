<?php
namespace FormBuilder\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use FormBuilder\Model\Table\FieldsTable;

/**
 * FormBuilder\Model\Table\FieldsTable Test Case
 */
class FieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \FormBuilder\Model\Table\FieldsTable
     */
    public $Fields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.form_builder.fields',
        'plugin.form_builder.forms',
        'plugin.form_builder.responses',
        'plugin.form_builder.field_options',
        'plugin.form_builder.response_datas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fields') ? [] : ['className' => FieldsTable::class];
        $this->Fields = TableRegistry::get('Fields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fields);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
