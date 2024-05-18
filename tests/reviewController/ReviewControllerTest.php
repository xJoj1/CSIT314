<?php
use PHPUnit\Framework\TestCase;

require_once 'Rate_Review.php';
require_once 'ReviewController.php';

class ReviewControllerTest extends TestCase
{
    private $rateReviewMock;
    private $controller;

    protected function setUp(): void
    {
        $this->rateReviewMock = $this->getMockBuilder(Rate_Review::class)
            ->setMethods(['addRateReview'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->controller = new ReviewController();

        $reflection = new ReflectionClass($this->controller);
        $property = $reflection->getProperty('rateReviewEntity');
        $property->setAccessible(true);
        $property->setValue($this->controller, $this->rateReviewMock);
    }

    public function testAddReviewSuccess()
    {
        $this->rateReviewMock->expects($this->once())
            ->method('addRateReview')
            ->with('buyer', 1, 2, 4, 'Great service')
            ->willReturn(true);

        $result = $this->controller->addReview('buyer', 1, 2, 4, 'Great service');
        $this->assertTrue($result);
    }

    public function testAddReviewEmptyReview()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Invalid input. Please ensure all fields are correctly filled.");

        $this->controller->addReview('buyer', 1, 2, 4, '');
    }

    public function testAddReviewInvalidRating()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Invalid input. Please ensure all fields are correctly filled.");

        $this->controller->addReview('buyer', 1, 2, 6, 'Great service');
    }

    public function testAddReviewNegativeRating()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Invalid input. Please ensure all fields are correctly filled.");

        $this->controller->addReview('buyer', 1, 2, -1, 'Great service');
    }
}
?>
