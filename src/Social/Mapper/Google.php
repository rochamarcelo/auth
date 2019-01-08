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

namespace CakeDC\Auth\Social\Mapper;

use Cake\Utility\Hash;

/**
 * Google Mapper
 *
 */
class Google extends AbstractMapper
{
    /**
     * Map for provider fields
     * @var
     */
    protected $_mapFields = [
        'avatar' => 'image.url',
        'full_name' => 'displayName',
        'email' => 'emails.0.value',
        'first_name' => 'name.givenName',
        'last_name' => 'name.familyName',
        'bio' => 'aboutMe',
        'link' => 'url'
    ];

    /**
     * Get link property value
     *
     * @param mixed $rawData raw data
     *
     * @return string
     */
    protected function _link($rawData)
    {
        return Hash::get($rawData, $this->_mapFields['link']) ?: '#';
    }
}
