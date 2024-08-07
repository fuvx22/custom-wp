<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
global $wpdb;
$table_name = $wpdb->prefix . 'certificate';

$certificates = $wpdb->get_results("SELECT * FROM $table_name");

?>

<body>
  <div class="wrap">
    <h1>Quản lý chứng chỉ</h1>
    <div class="container-fluid">
      <?php

      if ($certificates) {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr>';
        echo '<th>Số thứ tự</th>';
        echo '<th>Tên chứng chỉ</th>';
        echo '<th>Mẫu chứng chỉ</th>';
        echo '<th>Ngày tạo</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        $count = 1;
        foreach ($certificates as $certificate) {
          echo '<tr>';
          echo '<td>' . $count . '</td>';
          echo '<td>' . esc_html($certificate->name) . '</td>';
          echo '<td>' . esc_html($certificate->templateSvg) . '</td>';
          echo '<td>' . esc_html($certificate->enroll) . '</td>';
          echo '</tr>';
          $count++;
        }

        echo '</tbody>';
        echo '</table>';
      } else {
        echo '<p>Không có dữ liệu certificate.</p>';
      }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>