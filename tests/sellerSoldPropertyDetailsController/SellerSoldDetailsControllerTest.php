<?php
use PHPUnit\Framework\TestCase;

require_once 'PropertyListing.php';
require_once 'sellerSoldPropertyDetailsController.php';

class SellerSoldDetailsControllerTest extends TestCase {
    private $propertyListingMock;
    private $controller;

    protected function setUp(): void {
        $this->propertyListingMock = $this->createMock(PropertyListing::class);

        $this->controller = new SellerSoldDetailsController();

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

        try {
            $this->controller->handlePropertyRequest('');
        } catch (Exception $e) {
            $this->assertEquals('Header already sent', $e->getMessage());
        } finally {
            restore_error_handler();
        }
    }

    public function testHandlePropertyRequestWithIdAndIncrementViews() {
        $id = 123;
        $_GET['increment_views'] = 1;

        $this->propertyListingMock->expects($this->once())
            ->method('incrementViews')
            ->with($id);

        $this->propertyListingMock->expects($this->once())
            ->method('getListingById')
            ->with($id)
            ->willReturn('Mocked Listing Data');

        $result = $this->controller->handlePropertyRequest($id);
        $this->assertEquals('Mocked Listing Data', $result);
    }

    public function testHandlePropertyRequestWithIdWithoutIncrementViews() {
        $id = 123;
        unset($_GET['increment_views']);

        $this->propertyListingMock->expects($this->never())
            ->method('incrementViews');

        $this->propertyListingMock->expects($this->once())
            ->method('getListingById')
            ->with($id)
            ->willReturn('Mocked Listing Data');

        $result = $this->controller->handlePropertyRequest($id);
        $this->assertEquals('Mocked Listing Data', $result);
    }
}
?>
