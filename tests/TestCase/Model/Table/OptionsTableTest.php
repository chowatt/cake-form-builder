<?php
namespace FormBuilder\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use FormBuilder\Model\Table\OptionsTable;

/**
 * FormBuilder\Model\Table\OptionsTable Test Case
 */
class OptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \FormBuilder\Model\Table\OptionsTable
     */
    public $Options;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.form_builder.options',
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
        $config = TableRegistry::exists('Options') ? [] : ['className' => OptionsTable::class];
        $this->Options = TableRegistry::get('Options', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Options);

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
