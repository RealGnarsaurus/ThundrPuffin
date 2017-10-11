<?php
$Blogg = "\Yolo";
if (!is_dir('C:\xampp\htdocs\Blogg\createfolder\Blogg')) {
  mkdir('C:\xampp\htdocs\Blogg\createfolder\Blogg', 0777, true);
  echo("File created");
}
 ?>
 <?php


$file = "Blogg/style.css";
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
// Write the contents back to the file
 //file_put_contents("Blogg/empty.css", $current);
$myfile = fopen("Blogg/newfile.txt", "w") or die("Unable to open file!");
/*
file_put_contents('Blogg/empty.css', implode('',
  array_map(function($data) {
    return stristr($data,'body')
    ? "replacement line\n" : $data;
  }, file('Blogg/empty.css'))
));
*/
getLineWithString("Blogg/empty.css","kaffemaskinen","}");
function getLineWithString($fileName, $str,$endPoint) {
    echo $str;
    $lines = file($fileName);
    $startRow =0;
    $endRow =0;

    //echo count($lines);

    for ($i=0; $i < count($lines); $i++) {
        if (strpos($lines[$i], $str) !== false) { //Finds Words
            //echo $lines[$i];

              //echo $i . $lines[$i];
              $startRow = $i;
        }
    }
    $canFind = "true";
    for ($j=$startRow; $j < count($lines); $j++) {
        if (strpos($lines[$j], $endPoint) !== false && $canFind == "true") { //Finds Words
            //echo $lines[$i];
            //echo $j;
            $endRow = $j;
            $canFind = "false";
              //echo $j . $lines[$j];
        }
    }
    echo  " StartRow:".$startRow;
    echo  " EndRow:".$endRow;
    ?>
    <br>
    <br>
    <?php
    for ($x=$startRow; $x != $startRow + $endRow +1; $x++) {
      //echo $row +6;
      //echo $x;
      echo $x . $lines[$x];
      ?>
      <br>
      <?php
    }
    $line_i_am_looking_for = 1;
    $lines = file( $fileName , FILE_IGNORE_NEW_LINES );
    $lines[$line_i_am_looking_for] = 'background-color:Yellow;';
    file_put_contents( $fileName , implode( "\n", $lines ) );
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>

</body>
</html>
