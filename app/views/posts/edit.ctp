<?php
echo $form->create('Post', array('action' => 'edit'));
echo $form->input('title');
echo $form->input('body', array('rows' => '5'));
echo $form->input('id', array('type' => 'hidden'));
echo $form->end('edit');
?>
