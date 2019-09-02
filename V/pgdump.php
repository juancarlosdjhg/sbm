<?php
// File: pg_backup.php
// Purpose: backup postgres
// Date: 02 Dec 2000
// Author: Dan Wilson

$data_dir = "../V/backup";
$pg_dump_dir = "C:\Program Files\PostgreSQL\9.3\bin";

$dbname[] = "sbm";

$dump_date = date("Ymd_Hs");

$file_name = $data_dir . "/dump_" . $dump_date . ".sql";
if ($cont = count($dbname)) {
for ($i = 0; $i < $cont; $i++) {
	echo "1";
system("$pg_dump_dir/pg_dump.exe $dbname[$i] > $file_name");
}
} else {
	echo "2";
system("$pg_dump_dir/pg_dumpall > $file_name");
}

echo "Respaldo Finalizado";
?>
