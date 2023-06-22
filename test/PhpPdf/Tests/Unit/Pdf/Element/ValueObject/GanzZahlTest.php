<?php

namespace PdfPhp\Tests\Unit\Pdf\ValueObject;
use PdfPhp\Pdf\Element\ValueObject\Exception\IntegerRuleException;
use PdfPhp\Pdf\Element\ValueObject\GanzZahl;
use PHPUnit\Framework\TestCase;

class GanzZahlTest extends TestCase
{
    public function testGanzZahlIsValid()
    {
        $zahl = new GanzZahl(1);

        $this->assertEquals(1, $zahl->getValue());
    }

    /**
     * @dataProvider invalidGanzzahlen
     */
    public function testGanzZahleThrowsExceptionOnInvalidInput($invalidGanzZahl)
    {
        try {
            $invalidInput = $invalidGanzZahl;

            new GanzZahl($invalidInput);
            $this->fail("Fehler erwartet");
        } catch (\Throwable $exception) {
            $this->assertEquals(sprintf(IntegerRuleException::NOT_VALID_INTEGER, $invalidInput).'\n', $exception->getMessage());
            $this->assertTrue(true);
        }
    }

    public function invalidGanzzahlen()
    {
        return [
            ['a'],
            ['Ä'],
            ['O'],
            ['ß'],
            ['?'],
            ['%'],
            ['-'],
        ];
    }
}