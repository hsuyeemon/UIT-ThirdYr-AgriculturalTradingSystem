<?php
require_once('lib/QrReader.php');
$files=scandir('qrcodes');
print_r($files);
foreach ($files as $file) {
	# code...
}
?>