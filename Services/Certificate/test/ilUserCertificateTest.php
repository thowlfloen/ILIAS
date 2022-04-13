<?php declare(strict_types=1);
/* Copyright (c) 1998-2018 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * @author  Niels Theen <ntheen@databay.de>
 */
class ilUserCertificateTest extends ilCertificateBaseTestCase
{
    public function testCreateUserCertificate() : void
    {
        $userCertificate = new ilUserCertificate(
            1,
            20,
            'crs',
            400,
            'Niels Theen',
            123456789,
            '<xml>Some Content</xml>',
            '[]',
            null,
            1,
            'v5.4.0',
            true,
            '/some/where/background.jpg',
            '/some/where/thumbnail.svg',
            140
        );

        $this->assertSame(1, $userCertificate->getPatternCertificateId());
        $this->assertSame(20, $userCertificate->getObjId());
        $this->assertSame('crs', $userCertificate->getObjType());
        $this->assertSame(400, $userCertificate->getUserId());
        $this->assertSame('Niels Theen', $userCertificate->getUserName());
        $this->assertSame(123456789, $userCertificate->getAcquiredTimestamp());
        $this->assertSame('<xml>Some Content</xml>', $userCertificate->getCertificateContent());
        $this->assertSame('[]', $userCertificate->getTemplateValues());
        $this->assertEquals(0, $userCertificate->getValidUntil());
        $this->assertSame(1, $userCertificate->getVersion());
        $this->assertSame('v5.4.0', $userCertificate->getIliasVersion());
        $this->assertTrue($userCertificate->isCurrentlyActive());
        $this->assertSame('/some/where/background.jpg', $userCertificate->getBackgroundImagePath());
        $this->assertSame(140, $userCertificate->getId());
    }
}
