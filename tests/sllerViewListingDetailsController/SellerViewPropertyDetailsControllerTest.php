<?php
use PHPUnit\Framework\TestCase;

require_once 'PropertyListing.php';
require_once 'sellerViewListingDetailsController.php';

class SellerViewPropertyDetailsControllerTest extends TestCase {
    private $propertyListingMock;
    private $controller;

    protected function setUp(): void {

        $this->propertyListingMock = $this->createMock(PropertyListing::class);

        $this->controller = new SellerViewPropertyDetailsController();

        $reflection = new ReflectionClass($this->controller);
        $property = $reflection->getProperty('propertyListing');
        $property->setAccessible(true);
        $property->setValue($this->controller, $this->propertyListingMock);
    }

    public function testHandlePropertyRequestWithoutId() {
        $this->expectOutputString('');
        set_error_handler(function($errno, $errstr) {
            if (strpos($errstr, 'Cannot modify header information') !== false) {
                throw new Exception('Header already sent');
            }
        });

        $_GET = [];

        try {
            $this->controller->handlePropertyRequest();
        } catch (Exception $e) {
            $this->assertEquals('Header already sent', $e->getMessage());
        } finally {
            restore_error_handler();
        }
    }

    public function testHandlePropertyRequestWithIdAndIncrementViews() {
        $propertyId = 123;
        $_GET['id'] = $propertyId;
        $_GET['increment_views'] = 1;

        $this->propertyListingMock->expects($this->once())
            ->method('incrementViews')
            ->with($propertyId);

        $this->propertyListingMock->expects($this->once())
            ->method('getAllPropertyListings')
            ->with($propertyId)
            ->willReturn('Mocked Property Data');

        $result = $this->controller->handlePropertyRequest();
        $this->assertEquals('Mocked Property Data', $result);
    }

    public function testHandlePropertyRequestWithIdWithoutIncrementViews() {
        $propertyId = 123;
        $_GET['id'] = $propertyId;
        unset($_GET['increment_views']);

        $this->propertyListingMock->expects($this->never())
            ->method('incrementViews');

        $this->propertyListingMock->expects($this->once())
            ->method('getAllPropertyListings')
            ->with($propertyId)
            ->willReturn('Mocked Property Data');

        $result = $this->controller->handlePropertyRequest();
        $this->assertEquals('Mocked Property Data', $result);
    }

    public function testHandlePropertyRequestWithIdNotFound() {
        $propertyId = 123;
        $_GET['id'] = $propertyId;

        $this->propertyListingMock->expects($this->once())
            ->method('getAllPropertyListings')
            ->with($propertyId)
            ->willReturn(null);

        $this->expectOutputString('');
        set_error_handler(function($errno, $errstr) {
            if (strpos($errstr, 'Cannot modify header information') !== false) {
                throw new Exception('Header already sent');
            }
        });

        try {
            $this->controller->handlePropertyRequest();
        } catch (Exception $e) {
            $this->assertEquals('Header already sent', $e->getMessage());
        } finally {
            restore_error_handler();
        }
    }

    public function testGetPropertyDetails() {
        $propertyId = 123;

        $this->propertyListingMock->expects($this->once())
            ->method('getAllPropertyListings')
            ->with($propertyId)
            ->willReturn('Mocked Property Data');

        $result = $this->controller->getPropertyDetails($propertyId);
        $this->assertEquals('Mocked Property Data', $result);
    }
}
?>
