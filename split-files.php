//https://demo.nabtron.com/codementor/kusumajayaprasad/1/

$in = file("file");
$counter = 0; // to void warning    
while ($chunk = array_splice($in, 0, 2000)){
      $f = fopen("out".($counter++), "w");
      fputs($f, implode("", $chunk));
      fclose($f);
}
