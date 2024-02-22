<?php
include '../koneksi.php';

$queryPosting = $koneksi->query("SELECT * FROM posting");

if ($queryPosting->num_rows > 0) {
  $delimiter = "\t";
  $filename = "posting-data_" . date('Y-m-d') . ".xls";

  // Create a file pointer
  $f = fopen('php://memory', 'w');

  // Set column headers
  $fields = array('ID', 'Kategori', 'Member', 'Judul', 'Isi', 'Tanggal', 'Dibaca');
  fputcsv($f, $fields, $delimiter);

  // Output each row of the data, format line as csv and write to file pointer
  while ($row = $queryPosting->fetch_assoc()) {
    $lineData = array($row['posting_id'], $row['posting_kategori'], $row['posting_member'], $row['posting_judul'], $row['posting_isi'], $row['posting_tanggal'], $row['posting_dibaca']);
    fputcsv($f, $lineData, $delimiter);
  }

  // Move back to beginning of file
  fseek($f, 0);

  // Set headers to download file rather than displayed
  header('Content-Type: text/xls');
  header('Content-Disposition: attachment; filename="' . $filename . '";');

  // Output all remaining data on a file pointer
  fpassthru($f);
  exit;
}

?>