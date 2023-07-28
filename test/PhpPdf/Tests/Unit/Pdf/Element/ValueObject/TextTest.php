<?php declare(strict_types=1);

namespace PdfPhp\Tests\Unit\Pdf\ValueObject;

use PdfPhp\Pdf\Element\ValueObject\Exception\StringRuleException;
use PdfPhp\Pdf\Element\ValueObject\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testTextIsValid(): void
    {
        $zahl = new Text('a');

        $this->assertEquals('a', $zahl->getValue());
    }

    /**
     * @dataProvider invalidText
     */
    public function testTextThrowsExceptionOnInvalidInput($invalidtext): void
    {
        try {
            $invalidInput = $invalidtext;

            new Text($invalidInput);
            $this->fail("Fehler erwartet");
        } catch (\Throwable $exception) {
            $this->assertEquals(sprintf(StringRuleException::NOT_VALID_CHARACTER, $invalidInput).'\n', $exception->getMessage());
            $this->assertTrue(true);
        }
    }

    public static function invalidText(): array
    {
        return [
            [1],
            [3],
            ['$'],
            ['Ä'],
            ['?'],
            ['%'],
            ['-'],
        ];
    }
}