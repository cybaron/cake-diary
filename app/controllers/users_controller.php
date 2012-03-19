<?php
class UsersController extends AppController {
  var $name = 'Users';
  var $components = array('Auth');

  function beforeFilter() {
    $this->Auth->fields = array(
      'username' => 'email',
      'password' => 'password'
    );
    parent::beforefilter();
    $this->Auth->allow('login', 'add');
    $this->Auth->loginRedirect= array('controller' => 'posts', 'action' => 'index');
    $this->Auth->loginError = 'email 又は パスワードを正しく入力して下さい。';
  }

  function login() {
  }

  function logout() {
    $this->redirect($this->Auth->logout());
  }

  function index() {
    $this->User->recursive = 0;
    $this->set('users', $this->paginate());
  }

  function add() {
    if(!empty($this->data)) {
      if($this->data['User']['new_password'] === $this->data['User']['password_confirm']) {
        $this->data['User']['password'] = $this->Auth->password($this->data['User']['new_password']);

//        pr($this->data);exit;
        $this->User->create();
        if ($this->User->save($this->data)) {
          $this->Session->setFlash('ユーザー情報を登録しました。');
          $this->redirect(array('action' => 'login'));
        } else {
          $this->Session->setFlash('ユーザー情報を登録できませんでした。再度入力して下さい。');
        }
      } else {
        $this->Session->setFlash('パスワードを正しく入力して下さい。');
      }
    }
  }
}
