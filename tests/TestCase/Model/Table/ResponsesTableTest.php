<?php
namespace FormBuilder\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use FormBuilder\Model\Table\ResponsesTable;

/**
 * FormBuilder\Model\Table\ResponsesTable Test Case
 */
class ResponsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \FormBuilder\Model\Table\ResponsesTable
     */
    public $Responses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.form_builder.responses',
        'plugin.form_builder.forms',
        'plugin.form_builder.fields',
        'plugin.form_builder.options',
        'plugin.form_builder.response_datas',
        'plugin.form_builder.response_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Responses') ? [] : ['className' => ResponsesTable::class];
        $this->Responses = TableRegistry::get('Responses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Responses);

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
