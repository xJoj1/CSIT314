<?php
use PHPUnit\Framework\TestCase;

require_once 'LoginController.php';

class UserControllerTest extends TestCase {

    // 测试登录成功的情况
    public function testLoginUserSuccess() {
        // 模拟用户输入的用户名、密码和用户类型
        $username = "buyer";
        $password = "buyer123";
        $userType = "Buyer";

        // 创建 UserController 实例
        $userController = new UserController();

        // 模拟User类的返回值，假设用户名和密码验证通过
        $userMock = $this->getMockBuilder(User::class)
            ->onlyMethods(['findUserByUsernameAndType'])
            ->getMock();

        $userMock->expects($this->once())
            ->method('findUserByUsernameAndType')
            ->willReturn([
                'user_id' => 123,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

        // 将 UserController 中的 User 实例替换为模拟的实例
        $reflection = new ReflectionClass(UserController::class);
        $property = $reflection->getProperty('user');
        $property->setAccessible(true);
        $property->setValue($userController, $userMock);

        // 调用 UserController 中的 loginUser 方法
        $result = $userController->loginUser($username, $password, $userType);

        // 验证返回的消息是否为 null，表示成功登录
        $this->assertNull($result);
    }
}
?>
