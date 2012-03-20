<?php
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
  function startTest() {
    $this->User =& ClassRegistry::init('User');
  }

  function endTest() {
    unset($this->User);
    ClassRegistry::flush();
  }
}
?>
