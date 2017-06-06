<?php
namespace MathPHP\Tests\Probability\Distribution\Continuous\Multivariate;

use MathPHP\Probability\Distribution\Continuous\Multivariate\Dirichlet;
use MathPHP\Exception;

class DirichletTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForPDF
     */
    public function testPdf(array $xs, array $αs, $pdf)
    {
        $this->assertEquals($pdf, Dirichlet::pdf($xs, $αs), '', 0.00001);
    }

    /**
     * Test data made with scipy.stats.dirichlet.pdf
     */
    public function dataProviderForPdf(): array
    {
        return [
            [
                [0.07255081, 0.27811903, 0.64933016],
                [1, 2, 3],
                7.03579378,
            ],
            [
                [0.48061647, 0.26403299, 0.25535054],
                [1, 2, 3],
                1.0329588,
            ],
            [
                [0.1075077, 0.68975829, 0.20273401],
                [1, 2, 3],
                1.70098867,
            ],
            [
                [0.14909711, 0.20747317, 0.64342972],
                [1, 2, 3],
                5.15365594,
            ],
            [
                [0.19010044, 0.26225231, 0.54764725],
                [1, 2, 3],
                4.71924363,
            ],
            [
                [0.06652357, 0.53396899, 0.39950744],
                [1, 2, 3],
                5.11348541,
            ],
            [
                [0.16362941, 0.4521069, 0.38426368],
                [1, 2, 3],
                4.00544774,
            ],
        ];
    }

    public function testPdfArraysNotSameLengthException()
    {
        $xs = [0.1, 0.2];
        $αs = [1, 2, 3];

        $this->expectException(Exception\BadDataException::class);
        $pdf = Dirichlet::pdf($xs, $αs);
    }
}
