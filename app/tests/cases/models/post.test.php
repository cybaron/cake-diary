<?php
App::import('Model', 'User');
App::import('Model', 'Post');

class PostTestCase extends CakeTestCase {
  var $fixtures = array('app.user', 'app.post');

  function startTest() {
    $this->Post =& ClassRegistry::init('Post');
    $this->User =& ClassRegistry::init('User');
  }

  function endTest() {
    unset($this->Post);
    unset($this->User);
    ClassRegistry::flush();
  }

  function testValidateUserIdEmpty() {
    $data = array(
      'user_id' => null,
      'title' => 'diary title',
      'body' => 'diary body!'
    );
    $this->Post->create($data);
    $this->Post->validates();
    $result = $this->Post->invalidFields();
    $expected = array('user_id' => 'This field cannot be left blank');
    $this->assertEqual($result, $expected);
  }

  function testValidateUserIdNoUser() {
    //todo user_idに該当するユーザーが存在するかチェックする
    $data = array(
      'user_id' => 10,
      'title' => 'diary title',
      'body' => 'diary body!'
    );
    $this->Post->create($data);
    $this->Post->validates();
    $result = $this->Post->invalidFields();
    $expected = 'todo';
    $this->assertEqual($result, $expected);
  }

  function testValidateTitleEmpty() {
    $data = array(
      'user_id' => 1,
      'title' => '',
      'body' => 'diary body!'
    );
    $this->Post->create($data);
    $this->Post->validates();
    $result = $this->Post->invalidFields();
    $expected = array('title' => '何か入力して下さい。');
    $this->assertEqual($result, $expected);
  }

  function testValidateTitleLength() {
    $data = array(
      'user_id' => 1,
      'title' => '123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+123456789+',
      'body' => 'diary body!'
    );
    $this->Post->create($data);
    $this->Post->validates();
    $result = $this->Post->invalidFields();
    $expected = array('title' => 'タイトルは255文字以内で入力して下さい。');
    $this->assertEqual($result, $expected);
  }

  function testCheckAction() {
    $target_id = 1;
    $user_id = 1;

    $result = $this->Post->checkAction($target_id, $user_id);
    $this->assertTrue($result);
    
    $user_id = 2;
    $result = $this->Post->checkAction($target_id, $user_id);
    $this->assertFalse($result);
  }
}
