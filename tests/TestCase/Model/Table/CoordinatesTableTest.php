<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoordinatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoordinatesTable Test Case
 */
class CoordinatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoordinatesTable
     */
    protected $Coordinates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Coordinates',
        'app.Pharmacies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Coordinates') ? [] : ['className' => CoordinatesTable::class];
        $this->Coordinates = $this->getTableLocator()->get('Coordinates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Coordinates);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
