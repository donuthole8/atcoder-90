<?php
// 標準入力データ取得
fscanf(STDIN, "%d %d", $H, $W);
while ($line = fgets(STDIN)) {
  $tmp[] = trim($line);
}
foreach ($tmp as $value) {
  $A[] = explode(' ', $value);
}

// 転置行列
$_A = array_map(null, ...$A);

// 各行列の合計値
$row = [];
for ($i = 0; $i < $H; $i++) {
  $row[] = array_sum($A[$i]);
}

$column = [];
for ($j = 0; $j < $W; $j++) {
  $column[] = array_sum($_A[$j]);
}

// 各マスの値計算
for ($i = 0; $i < $H; $i++) {
  for ($j = 0; $j < $W; $j++) {
    $sum_value = -1 * $A[$i][$j];
    $sum_value += $row[$i] + $column[$j];

    echo $sum_value . " ";
    //if ($j != $W-1) {
    //  echo $sum_value . " ";
    //}
  }
  echo "\n";
  //if ($i != $H-1) {
  //  echo "\n";
  //}
}

?>
