<?php
if ($session->check('Message.auth')) $session->flash('auth');
echo $form->create('User', array('controller' => 'users', 'action' => 'login'));
echo $form->input('email');
echo $form->input('password');
echo $form->end('Login');
?>
<?php echo $this->Html->link('Signup', array('action' => 'add')); ?>
