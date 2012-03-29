<?php
class PostsController extends AppController {
  var $name = 'Posts';
  var $components = array('Auth');

  function index() {
    $data = $this->Post->findAllByUserId($this->Auth->user('id'));
    $this->set('posts', $data);
  }

  function view ($id = null) {
    $this->Post->id = $id;
    $post = $this->Post->read();

    if ($this->Post->checkAction($id, $this->Auth->user('id'))) {
      $this->set('post', $post);
    } else {
      $this->flash('他人のDiaryは閲覧できません', '/posts');
    }
  }

  function add() {
    if (!empty($this->data)) {
      $this->data['Post']['user_id'] = $this->Auth->user('id');
      if ($this->Post->save($this->data)) {
        $this->flash('Diary の投稿が完了しました。', '/posts');
      }
    }
  }

  function delete($id) {
    if(!$this->Post->checkAction($id, $this->Auth->user('id'))) {
        $this->flash('他人のDiaryは削除できません。', '/posts');
        return;
    } else {
      $this->Post->delete($id);
      $this->flash('id : ' . $id . ' のDiaryを削除しました。', '/posts');
    }
  }

  function edit($id = null) {
    if(!$this->Post->checkAction($id, $this->Auth->user('id'))) {
        $this->flash('他人のDiaryは更新できません。', '/posts');
        return;
    }

    if (empty($this->data)) {
      $this->data = $this->Post->read();
    } else {
      $target = $this->Post->findById($this->data['Post']['id']);
      // hiddenフィールドの書き換えチェック
      if ($target['Post']['user_id'] != $this->Auth->user('id')) {
        $this->flash('他人のDiaryは更新できません。', '/posts');
        return;
      }

      $this->data['Post']['user_id'] = $this->Auth->user('id');
      if ($this->Post->save($this->data['Post'])) {
        $this->flash('Diary の更新が完了しました。', '/posts');
        return;
      }
    }
  }
}
