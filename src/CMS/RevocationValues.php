<?php
/**
 * RevocationValues
 *
 * @author    Nurlan Mukhanov <nurike@gmail.com>
 * @copyright 2020 Nurlan Mukhanov
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://github.com/Adapik/CMS
 */

namespace Adapik\CMS;

use Adapik\CMS\Interfaces\CMSInterface;
use Exception;
use FG\ASN1\ASN1Object;
use FG\ASN1\ExplicitlyTaggedObject;
use FG\ASN1\Universal\Sequence;
use FG\ASN1\Universal\Set;

/**
 * Class RevocationValues
 *
 * @see     Maps\RevocationValues
 * @package Adapik\CMS
 */
class RevocationValues extends UnsignedAttribute
{
    protected static $oid = '1.2.840.113549.1.9.16.2.24';

    /**
     * @param string $content
     *
     * @return RevocationValues
     * @throws Exception
     */
    public static function createFromContent(string $content): CMSInterface
    {
        return new self(self::makeFromContent($content, Maps\RevocationValues::class, Sequence::class));
    }

    /**
     * @return BasicOCSPResponse|null
     * @throws Exception
     */
    public function getBasicOCSPResponse(): ?BasicOCSPResponse
    {
        $return = null;
        $basicOCSPResponse = $this->getDataByTag(1);

        if ($basicOCSPResponse)
            $return = new BasicOCSPResponse($basicOCSPResponse);

        return $return;
    }

    /**
     * @param int $tagNumber
     * @return ASN1Object|mixed|null
     * @throws Exception
     */
    private function getDataByTag(int $tagNumber): ?ASN1Object
    {
        $return = null;
        /** @var ExplicitlyTaggedObject[] $tagged */
        $tagged = $this->object->findChildrenByType(Set::class)[0]->getChildren()[0]->findChildrenByType(ExplicitlyTaggedObject::class);

        if (count($tagged) > 0) {
            foreach ($tagged as $item) {
                if ($item->getIdentifier()->getTagNumber() == $tagNumber) {
                    $sequence = $item->getChildren()[0];
                    if (count($sequence->getChildren()) > 0) {
                        $return = $sequence->getChildren()[0];
                        break;
                    }
                }
            }
        }
        return $return;
    }

    /**
     * @return CertificateList|null
     * @throws Exception
     */
    public function getCertificateList(): ?CertificateList
    {
        $return = null;
        $certificateList = $this->getDataByTag(0);

        if ($certificateList)
            $return = new CertificateList($certificateList);

        return $return;
    }
}
