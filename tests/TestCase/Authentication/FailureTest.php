<?php
/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Authentication\Authenticator\Result;
use Authentication\Identifier\IdentifierCollection;
use CakeDC\Auth\Authentication\Failure;
use CakeDC\Auth\Authenticator\FormAuthenticator;
use Cake\TestSuite\TestCase;

class FailureTest extends TestCase
{
    /**
     * test getAuthenticator, getResult
     *
     * @return void
     */
    public function testGetters()
    {
        $authenticator = new FormAuthenticator(new IdentifierCollection([]));
        $result = new Result(
            ['id' => '10', 'username' => 'johndoe'],
            Result::SUCCESS
        );
        $failure = new Failure($authenticator, $result);
        $this->assertSame($authenticator, $failure->getAuthenticator());
        $this->assertSame($result, $failure->getResult());
    }
}
