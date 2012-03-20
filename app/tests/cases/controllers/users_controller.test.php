<?php
class UsersControllerTest extends CakeTestCase {
  function startCase() {
    echo '<h1>テストケースを開始します</h1>';
  }
  function endCase() {
    echo '<h1>テストケースを終了します</h1>';
  }
  function startTest($method) {
    echo '<h3>メソッド「' . $method . '」を開始します</h3>';
  }
  function endTest($method) {
    echo '<hr>';
  }

  function testAdd() {
    $result = $this->testAction('/users/add', array('result' => 'contents'));
    debug($result);
  }
//
//  function testAddSuccess() {
//  }
//
//  function testAddFailedEmptyName() {
//  }
//
//  function testAddFailedEmptyEmail() {
//  }
//
//  function testAddFailedSameEmail() {
//  }
//
//  function testAddFailedEmptyPassword() {
//  }
//
//  function testAddFailedEmptyPasswordConfirm() {
//  }

  function testLogin() {
    $result = $this->testAction('/users/login', array('result' => 'contents'));
    debug($result);
  }

  function testLoginSuccess() {
    $data = array(
      'User' => array(
        'email'    => 'cybaron@gmail.com',
        'password' => 'password'
      )
    );
    $result = $this->testAction('/users/login', array(
      'fixturize' => true,
      'data'      => $data, 
      'method'    => 'post',
      'return'    => 'contents'
    )); 
    debug($result);
  }
//
//  function testLoginFailedEmptyEmail() {
//    $data = array(
//      'User' => array(
//        'email'    => '',
//        'password' => 'password'
//      )
//    );
//    $result = $this->testAction('/users/login', array(
//      'fixturize' => true,
//      'data'      => $data, 
//      'method'    => 'post',
//      'return'    => 'contents'
//    )); 
//    debug($result);
//  }
//
//  function testLoginFailedEmptyPassword() {
//    $result = $this->testAction('users/login', array(
//      'fixturize' => true,
//      'data'      => $data, 
//      'method'    => 'post',
//      'return'    => 'contents'
//    )); 
//  }
//
//  function testLoginFailedWrongPassword() {
//    $result = $this->testAction('users/login', array(
//      'fixturize' => true,
//      'data'      => $data, 
//      'method'    => 'post'
//    )); 
//  }
}
?>
