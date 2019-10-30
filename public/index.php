<?php
$config =include"../dbconf.php";
// echo "대림대";
// print_r($config);

require "../Loading.php";
// require "../Module/Database/Database.php";
// require "../Module/Database/Table.php";

$db = new \Module\Database\Database($config);
echo "<br>";
$query = "SHOW TABLES";
$result = $db->queryExecute($query);

$count = mysqli_num_rows($result);
$content = ""; //초기화
for($i=0;$i<$count;$i++){
    $row = mysqli_fetch_object($result);
    $content .="<tr>";
    $content .= "<td>$i</td>";
    $content .= "<td>".$row->Table_in_php."</td>";

}

$body = file_get_contents("../resource/table.html");
$body = str_replace("{{content}}",$content,$body);
echo $body;