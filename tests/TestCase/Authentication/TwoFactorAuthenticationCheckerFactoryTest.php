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
namespace CakeDC\Auth\Test\TestCase\Authentication;

use CakeDC\Auth\Authentication\DefaultTwoFactorAuthenticationChecker;
use CakeDC\Auth\Authentication\TwoFactorAuthenticationCheckerFactory;
use Cake\Core\Configure;
use Cake\TestSuite\TestCase;

class TwoFactorAuthenticationCheckerFactoryTest extends TestCase
{
    /**
     * Test getChecker method
     *
     * @return void
     */
    public function testGetChecker()
    {
        $result = (new TwoFactorAuthenticationCheckerFactory())->build();
        $this->assertInstanceOf(DefaultTwoFactorAuthenticationChecker::class, $result);
    }

    /**
     * Test getChecker method
     *
     * @return void
     */
    public function testGetCheckerInvalidInterface()
    {
        Configure::write('OneTimePasswordAuthenticator.checker', 'stdClass');
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid config for 'OneTimePasswordAuthenticator.checker', 'stdClass' does not implement 'CakeDC\Auth\Authentication\TwoFactorAuthenticationCheckerInterface'");
        (new TwoFactorAuthenticationCheckerFactory())->build();
    }
}
