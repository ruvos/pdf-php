<?php

namespace PdfPhp\Tests\Unit\Pdf\ValueObject;
use PdfPhp\Pdf\Element\ValueObject\Exception\IntegerRuleException;
use PdfPhp\Pdf\Element\ValueObject\Exception\PLZLengthException;
use PdfPhp\Pdf\Element\ValueObject\GanzZahl;
use PdfPhp\Pdf\Element\ValueObject\Postleitzahl;
use PdfPhp\Pdf\Element\ValueObject\Rule\PLZLengthRule;
use PHPUnit\Framework\TestCase;

class PLZTest extends TestCase
{
    public function testPostleitzahlIsValid()
    {
        $zahl = new Postleitzahl(42929);

        $this->assertEquals(42929, $zahl->getValue());
    }

    /**
     * @dataProvider invalidPostleitzahlenLength
     */
    public function testPostleitzahlThrowsExceptionOnInvalidInput($invalidGanzZahl)
    {
        try {
            $invalidInput = $invalidGanzZahl;

            new Postleitzahl($invalidInput);
            $this->fail("Fehler erwartet");
        } catch (\Throwable $exception) {
            $this->assertEquals(sprintf(PLZLengthException::NOT_VALID_LENGTH, $invalidInput).'\n', $exception->getMessage());
            $this->assertTrue(true);
        }
    }

    public function invalidPostleitzahlenLength()
    {
        return [
            [323],
            [23],
            [1],
            [234233],
        ];
    }

    public function testPostleitzahlThrowsExceptionOnInputWithAlphabeticLetter()
    {
        try {
            $invalidInput = 'ä';

            new Postleitzahl($invalidInput);
            $this->fail("Fehler erwartet");
        } catch (\Throwable $exception) {
            $this->assertEquals(sprintf(IntegerRuleException::NOT_VALID_INTEGER, $invalidInput).'\n'.sprintf(PLZLengthException::NOT_VALID_LENGTH, $invalidInput).'\n', $exception->getMessage());
            $this->assertTrue(true);
        }
    }
}