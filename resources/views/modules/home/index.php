<?= include_part('layouts.header', ['title' => 'Anasayfa']) ?>

<?= print_r($db[0]->db->query("SHOW TABLES")->fetchAll(PDO::FETCH_ASSOC)); ?>

<?= include_part('layouts.footer', ['title' => 'Anasayfa']) ?>
