<?php
if ($session->check('Message.auth')) $session->flash('auth');
echo $form->create('User');
echo $form->input('username');
echo $form->input('email');
echo $form->input('new_password', array('type'=>'password', 'value'=>'', 'label'=>'Password'));
echo $form->input('password_confirm', array('type' => 'password', 'value'=>''));
echo $form->end('Add');
?>
