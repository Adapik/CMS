<?php
/**
 * TBSCertList
 *
 * @author    Nurlan Mukhanov <nurike@gmail.com>
 * @copyright 2020 Nurlan Mukhanov
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://github.com/Adapik/CMS
 */

namespace Adapik\CMS;

use Adapik\CMS\Exception\FormatException;
use Adapik\CMS\Interfaces\CMSInterface;
use FG\ASN1\Universal\Sequence;

/**
 * Class TBSCertList
 *
 * @see     Maps\TBSCertList
 * @package Adapik\CMS
 */
class TBSCertList extends CMSBase
{
    /**
     * @param string $content
     * @return TBSCertList
     * @throws FormatException
     */
    public static function createFromContent(string $content): CMSInterface
    {
        return new self(self::makeFromContent($content, Maps\TBSCertList::class, Sequence::class));
    }
}
