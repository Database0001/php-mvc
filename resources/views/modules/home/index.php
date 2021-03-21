<?= include_part('layouts.header', ['title' => 'Anasayfa']) ?>
<pre>
<?php print_r($db[0]->db->query("SHOW TABLES")->fetchAll(PDO::FETCH_ASSOC)); ?>

<?= include_part('layouts.footer', ['title' => 'Anasayfa']) ?>