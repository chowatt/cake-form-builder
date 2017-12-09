<?php
namespace FormBuilder\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use FormBuilder\Model\Table\ResponseFieldsTable;

/**
 * FormBuilder\Model\Table\ResponseFieldsTable Test Case
 */
class ResponseFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \FormBuilder\Model\Table\ResponseFieldsTable
     */
    public $ResponseFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.form_builder.response_fields',
        'plugin.form_builder.responses',
        'plugin.form_builder.forms',
        'plugin.form_builder.fields',
        'plugin.form_builder.options',
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
        $config = TableRegistry::exists('ResponseFields') ? [] : ['className' => ResponseFieldsTable::class];
        $this->ResponseFields = TableRegistry::get('ResponseFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResponseFields);

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
