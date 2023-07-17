<?php
// 標準入力データ取得
/** 生徒[クラス, 点数] */
fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++) {
  $tmp[] = trim(fgets(STDIN));
}
foreach ($tmp as $value) {
  /** 
   * class => int,
   * score => int,
   */
  $students[] = explode(' ', $value);
}

/** 質問 */
fscanf(STDIN, "%d", $Q);
while ($line = fgets(STDIN)) {
  $temp = trim($line);
  $queries[] = explode(' ', $temp);
}

// 1組と2組の配列に分ける
for ($i = 0; $i < $N; $i++) {
  if ($students[$i][0] == 1) {
    $student_score_class1[] = (int)$students[$i][1];
    $student_score_class2[] = 0;
  } else {
    $student_score_class1[] = 0;
    $student_score_class2[] = (int)$students[$i][1];
  }
}

// 累積和を求める
$score_sum_class1[] = (int)$student_score_class1[0];
$score_sum_class2[] = (int)$student_score_class2[0];
for ($i = 1; $i < $N; $i++) {
  $score_sum_class1[] = (int)$student_score_class1[$i] + (int)$score_sum_class1[$i-1];
  $score_sum_class2[] = (int)$student_score_class2[$i] + (int)$score_sum_class2[$i-1];
}

// 点数合計値の計算
for ($i = 0; $i < $Q; $i++) {
  $sum_score1 = $score_sum_class1[(int)$queries[$i][1]-1] - $score_sum_class1[(int)$queries[$i][0]-2];
  $sum_score2 = $score_sum_class2[(int)$queries[$i][1]-1] - $score_sum_class2[(int)$queries[$i][0]-2];
  echo $sum_score1 . " " . $sum_score2 . "\n";
}
?>
