<?php
/**
 * CertID
 *
 * @author    Nurlan Mukhanov <nurike@gmail.com>
 * @copyright 2020 Nurlan Mukhanov
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://github.com/Adapik/CMS
 */

namespace Adapik\CMS\Maps;

use FG\ASN1\Identifier;

abstract class CertID
{
    /**
     * CertID ::= SEQUENCE {
     *        hashAlgorithm      AlgorithmIdentifier,
     *        issuerNameHash     OCTET STRING, -- Hash of Issuer's DN
     *        issuerKeyHash      OCTET STRING, -- Hash of Issuers public key
     *        serialNumber       CertificateSerialNumber
     * }
     */
    const MAP = [
        'type' => Identifier::SEQUENCE,
        'children' => [
            'hashAlgorithm' => AlgorithmIdentifier::MAP,
            'issuerNameHash' => ['type' => Identifier::OCTETSTRING],
            'issuerKeyHash' => ['type' => Identifier::OCTETSTRING],
            'serialNumber' => CertificateSerialNumber::MAP,
        ],
    ];
}
