<?php

/**
 * PolicyQualifierId
 *
 * PHP version 5
 *
 * @category  File
 * @package   ASN1
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2016 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace Adapik\CMS\Maps;

use FG\ASN1\Identifier;

/**
 * PolicyQualifierId
 *
 * @package ASN1
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class PolicyQualifierId
{
    const MAP = ['type' => Identifier::OBJECT_IDENTIFIER];
}
