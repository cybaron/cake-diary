<h1>Diary List</h1>
<p><?php echo $html->link('add', '/posts/add'); ?>
<table>
  <tr>
    <th>command</th>
    <th>Id</th>
    <th>Title</th>
    <th>Created</th>
  </tr>
  <?php foreach ($posts as $post): ?>
  <tr>
    <td>
      <?php echo $html->link('Update', "/posts/edit/".$post['Post']['id']); ?>
      <?php echo $html->link(
        'Delete',
        "/posts/delete/".$post['Post']['id'],
        null,
        '削除しても良いですか？'
      ); ?>
    </td>
    <td><?php echo $post['Post']['id']; ?></td>
    <td><?php echo $html->link($post['Post']['title'], "/posts/view/".$post['Post']['id']); ?></td>
    <td><?php echo $post['Post']['created']; ?></td>
  </tr>
  <?php endforeach; ?>
</table>
