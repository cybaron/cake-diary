<?php
class Post extends AppModel {
  var $name = 'Post';
  var $belongsTo = 'User';

  var $validate = array(
    'user_id' => array(
      'rule' => 'notEmpty'
    ),
    'title' => array(
      'notempty' => array(
        'rule' => 'notEmpty',
        'message' => '何か入力して下さい。',
        'last' => true
      ),
      'maxlength' => array(
        'rule' => array('maxLength', '255'),
        'message' => 'タイトルは255文字以内で入力して下さい。',
        'last' => true
      ),
    ),
  );

  function checkAction($target_id, $user_id) {
    // ログインユーザーがpostを操作できるか判定
    $data = ($this->findById($target_id));
    return $data['Post']['user_id'] == $user_id ? true : false;
  }
}
