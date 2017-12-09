<?php
namespace FormBuilder\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use FormBuilder\Model\Table\FormsTable;

/**
 * FormBuilder\Model\Table\FormsTable Test Case
 */
class FormsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \FormBuilder\Model\Table\FormsTable
     */
    public $Forms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.form_builder.forms',
        'plugin.form_builder.owners',
        'plugin.form_builder.fields',
        'plugin.form_builder.responses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Forms') ? [] : ['className' => FormsTable::class];
        $this->Forms = TableRegistry::get('Forms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Forms);

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
