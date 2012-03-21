<?php
class User extends AppModel {
  var $name = 'User';

  var $validate = array(
    'username' => array(
      'rule' => 'notEmpty',
      'message' => '何か入力して下さい。'
    ),
    'email' => array(
      'notempty' => array(
        'rule' => 'notEmpty',
        'message' => '何か入力して下さい。',
        'last'    => true
      ),
      'email' => array(
        'rule' => 'email',
        'message' => '正しくemailを入力して下さい。',
        'last'    => true
      ),
      'unique' => array(
        'rule' => 'isUnique',
        'message' => 'このemailは既に登録されています。'
      )
    ),
    'password' => array(
      'notempty' => array(
        'rule' => 'notEmpty',
        'message' => ''
      ),
    ),
    'new_password' => array(
      'between' => array(
        'rule' => array('between', 6, 20),
        'required' => true,
        'message' => 'passwordは6〜20文字以内で入力して下さい。'
      ),
    ),
    'password_confirm' => array(
      'rule' => 'notEmpty',
      'message' => '何か入力して下さい。'
    ),
  );
}
