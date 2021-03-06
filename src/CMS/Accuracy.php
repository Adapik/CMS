<?php
/**
 * Accuracy
 *
 * @author    Nurlan Mukhanov <nurike@gmail.com>
 * @copyright 2020 Nurlan Mukhanov
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://github.com/Adapik/CMS
 */

namespace Adapik\CMS;

use Adapik\CMS\Interfaces\CMSInterface;
use FG\ASN1\ASN1ObjectInterface;
use FG\ASN1\Exception\ParserException;
use FG\ASN1\Universal\Integer;
use FG\ASN1\Universal\Sequence;

/**
 * Class Accuracy
 *
 * @see     Maps\Accuracy
 * @package Adapik\CMS
 */
class Accuracy extends CMSBase
{
    /**
     * @param string $content
     *
     * @return Accuracy
     * @throws Exception\FormatException
     */
    public static function createFromContent(string $content): CMSInterface
    {
        return new self(self::makeFromContent($content, Maps\Accuracy::class, Sequence::class));
    }

    /**
     * @return \FG\ASN1\Universal\Integer|ASN1ObjectInterface
     * @throws ParserException
     * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
     */
    public function getSeconds(): \FG\ASN1\Universal\Integer
    {
        $integers = $this->object->findChildrenByType(Integer::class);

        $binary = $integers[0]->getBinary();

        return Integer::fromBinary($binary);
    }
}
