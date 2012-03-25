<?php
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
  var $fixtures = array('app.user');
  var $TestObject = null;

  function startTest() {
    $this->User =& ClassRegistry::init('User');
  }

  function endTest() {
    unset($this->User);
    ClassRegistry::flush();
  }

  function testValidateSuccess() {
    $data = array(
      'username' => 'test',
      'email' => 'test@gmail.com',
      'password' => '6cc94c7ed0b63a6614517c80b6362ce45c328569',
      'new_password' => 'password'
    );
    $this->User->set($data);
    $result = $this->User->validates();
    $this->assertTrue($result);
  }

  function testValidateUsernameEmpty() {
    $data = array(
      'username' => '',
      'email' => 'test@gmail.com',
      'password' => '6cc94c7ed0b63a6614517c80b6362ce45c328569',
      'new_password' => 'password'
    );
    $this->User->create($data);
    $this->User->validates();
    $result = $this->User->invalidFields();
    $expected = array('username' => '何か入力して下さい。');
    $this->assertEqual($result, $expected);
  }

  function testValidateEmailEmpty() {
    $data = array(
      'username' => 'test',
      'email' => '',
      'password' => '6cc94c7ed0b63a6614517c80b6362ce45c328569',
      'new_password' => 'password'
    );
    $this->User->create($data);
    $this->User->validates();
    $result = $this->User->invalidFields();
    $expected = array('email' => '何か入力して下さい。');
    $this->assertEqual($result, $expected);
  }

  function testValidatePasswordEmpty() {
    $data = array(
      'username' => 'test',
      'email' => 'test@gmail.com',
      'password' => 'dummydummy',
      'new_password' => ''
    );
    $this->User->create($data);
    $this->User->validates();
    $result = $this->User->invalidFields();
    $expected = array('new_password' => '何か入力して下さい。');
    $this->assertEqual($result, $expected);
  }

  function testValidatePasswordToShort() {
    $data = array(
      'username' => 'test',
      'email' => 'test@gmail.com',
      'password' => '123',
      'new_password' => '123'
    );
    $this->User->create($data);
    $this->User->validates();
    $result = $this->User->invalidFields();
    $expected = array('new_password' => 'passwordは6〜20文字以内で入力して下さい。');
    $this->assertEqual($result, $expected);
  }

  function testValidatePasswordToLong() {
    $data = array(
      'username' => 'test',
      'email' => 'test@gmail.com',
      'password' => '123456789+123456789+*****',
      'new_password' => '123456789+123456789+*****'
    );
    $this->User->create($data);
    $this->User->validates();
    $result = $this->User->invalidFields();
    $expected = array('new_password' => 'passwordは6〜20文字以内で入力して下さい。');
    $this->assertEqual($result, $expected);
  }

  function testValidateEmailNotUniq() {
    $data = array(
      'username' => 'test',
      'email' => 'cybaron@gmail.com',
      'password' => '123456789+',
      'new_password' => '123456789+'
    );
    $this->User->create($data);
    $this->User->validates();
    $result = $this->User->invalidFields();
    $expected = array('email' => 'このemailは既に登録されています。');
    $this->assertEqual($result, $expected);
  }
}
?>
