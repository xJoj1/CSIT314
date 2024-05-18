<?php
use PHPUnit\Framework\TestCase;

require_once 'PropertyListing.php';
require_once 'SellerTrackEngagementController.php';

class SellerTrackEngagementControllerTest extends TestCase {
    private $propertyListingMock;
    private $controller;

    protected function setUp(): void {
        $this->propertyListingMock = $this->createMock(PropertyListing::class);

        $this->controller = new SellerTrackEngagementController();

        $reflection = new ReflectionClass($this->controller);
        $property = $reflection->getProperty('propertyListing');
        $property->setAccessible(true);
        $property->setValue($this->controller, $this->propertyListingMock);
    }

    public function testGetEngagementMetrics() {
        $mockMetrics = [
            ['id' => 1, 'PropertyName' => 'Property 1', 'Shortlisted' => 5, 'views' => 100],
            ['id' => 2, 'PropertyName' => 'Property 2', 'Shortlisted' => 3, 'views' => 150],
        ];

        $this->propertyListingMock->expects($this->once())
            ->method('getEngagementMetrics')
            ->willReturn($mockMetrics);

        $result = $this->controller->getEngagementMetrics();
        $this->assertEquals($mockMetrics, $result);
    }
}
?>
