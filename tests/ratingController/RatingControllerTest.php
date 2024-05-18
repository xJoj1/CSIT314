<?php
use PHPUnit\Framework\TestCase;

require_once 'Rate_Review.php';
require_once 'RatingController.php';

class RatingControllerTest extends TestCase
{
    private $rateReviewMock;
    private $controller;

    protected function setUp(): void
    {
        $this->rateReviewMock = $this->getMockBuilder(Rate_Review::class)
            ->setMethods(['addRateReview'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->controller = new RatingController();

        $reflection = new ReflectionClass($this->controller);
        $property = $reflection->getProperty('rateReviewEntity');
        $property->setAccessible(true);
        $property->setValue($this->controller, $this->rateReviewMock);
    }

    public function testAddRatingSuccess()
    {
        $this->rateReviewMock->expects($this->once())
            ->method('addRateReview')
            ->with('buyer', 1, 2, 4, '')
            ->willReturn(true);

        $result = $this->controller->addRating('buyer', 1, 2, 4);
        $this->assertTrue($result);
    }

    public function testAddRatingWithReviewSuccess()
    {
        $this->rateReviewMock->expects($this->once())
            ->method('addRateReview')
            ->with('buyer', 1, 2, 4, 'Great service')
            ->willReturn(true);

        $result = $this->controller->addRating('buyer', 1, 2, 4, 'Great service');
        $this->assertTrue($result);
    }

    public function testAddRatingFailure()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Invalid rating: Rating must be between 0 and 5.");

        $this->controller->addRating('buyer', 1, 2, 6);
    }
}
?>
