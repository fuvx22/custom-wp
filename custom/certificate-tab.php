<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
  .search-input {
    max-height: 28px;
    /* Điều chỉnh chiều cao của input */
    line-height: 1.5;
    /* Điều chỉnh line height */
    padding: 5px 10px;
    /* Điều chỉnh padding */
    font-size: 14px;
    /* Điều chỉnh font size */
  }
</style>

<?php
global $wpdb;
$table_name = $wpdb->prefix . 'user_submisstion';

$current_url = add_query_arg(NULL, NULL);
$search_value = isset($_GET['s']) ? esc_attr($_GET['s']) : '';

$record_per_page = 10;
$page = isset($_GET['p']) ? $_GET['p'] : '1';
$int_page = intval($page);
$skip_value = ($int_page - 1) * $record_per_page;
$base_path = 'http://localhost/wordpress/wp-admin/admin.php?page=chung-chi&s=' . $search_value;


$search_sql = "";
if (!empty($search_value)) {
  $search = '%' . $search_value . '%';
  $search_sql .= " WHERE name LIKE '$search' OR email LIKE '$search' OR phone LIKE '$search'";

  $total_record = $wpdb->get_var("SELECT COUNT(*) FROM $table_name $search_sql");
  $total_page = ceil($total_record / $record_per_page);
} else {
  $total_record = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
  $total_page = ceil($total_record / $record_per_page);
}


$users = $wpdb->get_results("SELECT id, name, phone, email, certificated 
FROM $table_name $search_sql ORDER BY id DESC LIMIT $record_per_page OFFSET $skip_value");

?>

<body>
  <div class="wrap">
    <h1>Cấp chứng chỉ</h1>
    <div class="container-fluid">
      <div class="d-flex justify-content-between mb-1">
        <button class="button">Lọc</button>

        <form method="GET" action="">
          <?php
          // Giữ lại tất cả các parameter hiện có
          foreach ($_GET as $key => $value) {
            if ($key !== 's' && $key !== 'p') { // Bỏ qua 's' và 'p'
              echo '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '">';
            }
          }
          ?>
          <span>
            <input class="search-input" type="text" name="s" placeholder="Tìm kiếm..." value="<?php echo $search_value; ?>" />
            <input type="submit" value="Tìm kiếm" class="button button-primary" />
          </span>
        </form>
      </div>
      <?php

      if ($users) {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr>';
        echo '<th>Tên</th>';
        echo '<th>SĐT</th>';
        echo '<th>Email</th>';
        echo '<th>Chứng chỉ</th>';
        echo '<th>Hành động</th>';

        echo '</tr></thead>';
        echo '<tbody>';

        foreach ($users as $user) {
          echo '<tr>';
          echo '<td>' . esc_html($user->name) . '</td>';
          echo '<td>' . esc_html($user->phone) . '</td>';
          echo '<td>' . esc_html($user->email) . '</td>';
          echo '<td>' . esc_html($user->certificated) . '</td>';
          echo
          '<td>
            <select onchange="handleSelectChange(event)">
              <option value="">Chọn hành động</option>
              <option value="cap-chung-chi">Cấp chứng chỉ</option>
              <option value="huy-chung-chi">Hủy chứng chỉ</option>
              <option value="delete-user">Xóa</option>
            </select>
          </td>';
          echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
      } else {
        echo '<p>Không có dữ liệu user.</p>';
      }
      ?>
      <ul class="pagination justify-content-center mt-1">
        <li class="page-item <?= $page == '1' ? 'disabled' : '' ?>">
          <a class="page-link" href="<?= $base_path . '&p=' . ($int_page - 1) ?>" tabindex="-1" aria-disabled="true">&lsaquo;</a>
        </li>
        <?php

        $max_pages_show = 3; // Số lượng trang tối đa hiển thị

        // Tính toán khoảng trang cần hiển thị
        $start_page = max(1, $page - floor($max_pages_show / 2));
        $end_page = min($total_page, $start_page + $max_pages_show - 1);

        // Hiển thị '...' nếu không bắt đầu từ trang 1
        if ($start_page > 1) {
          $pagination .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }

        // Hiển thị các trang
        for ($i = $start_page; $i <= $end_page; $i++) {
          if ($i == $page) {
            $pagination .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
          } else {
            $pagination .= '<li class="page-item"><a class="page-link" href="' . $base_path . '&p=' . $i . '">' . $i . '</a></li>';
          }
        }

        // Hiển thị '...' nếu không kết thúc ở trang cuối cùng
        if ($end_page < $total_page) {
          $pagination .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }
        echo $pagination;
        ?>
        <li class="page-item <?= $page == $total_page ? 'disabled' : '' ?>">
          <a class="page-link" href="<?= $base_path . '&p=' . ($int_page + 1) ?>">&raquo;</a>
        </li>
      </ul>
    </div>
  </div>
  <script>
    function handleSelectChange(event) {
      var select = event.target;
      var value = select.value;
      if (value === "cap-chung-chi") {
        capChungChi();
      } else if (value === "huy-chung-chi") {
        huyChungChi();
      } else if (value === "delete-user") {
        deleteUser();
      }
      // Đặt lại giá trị của select về mặc định để có thể chọn lại hành động
      select.value = "";
    }

    function capChungChi() {
      alert("Cấp chứng chỉ được chọn");
      // Thực hiện các hành động khác ở đây
    }

    function huyChungChi() {
      alert("Hủy chứng chỉ được chọn");
      // Thực hiện các hành động khác ở đây
    }

    function deleteUser() {
      alert("Xóa người dùng được chọn");
      // Thực hiện các hành động khác ở đây
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>