<?php
$session->flash();
echo $form->create('Post');
echo $form->input('title');
echo $form->input('body', array('rows' => '5'));
echo $form->end('Add');
?>
