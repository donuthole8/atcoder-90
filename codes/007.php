<?php
// 標準入力データ取得
/** クラス */
fscanf(STDIN, "%d", $N);
$A = explode(' ', trim(fgets(STDIN)));

/** 生徒 */
fscanf(STDIN, "%d", $Q);
while ($line = fgets(STDIN)) {
  $B[] = trim($line);
}

// クラスのレーティングをソート
sort($A);

// 各マスの計算
for ($i = 0; $i < $Q; $i++) {
  // Bのレーティング
  $B_rating = $B[$i];

  // 二分探索でBのレーティングに最も近い値との差分を取得
  echo binary_search($A, $N, $B_rating) . "\n";
}


/**
 * @param int[] $A_sorted
 */
function binary_search(array $A_sorted, int $N, int $B_rating): int {
  // 二分探索
  $low  = 0;
  $high = $N;

  while ($low <= $high) {
    $pivot = (int)(($low + $high) / 2);

    if ($A_sorted[$pivot] == $B_rating) {
      return 0;
    }

    if ($B_rating > $A_sorted[$pivot]) {
      $low = $pivot + 1;
    }
    if ($B_rating < $A_sorted[$pivot]) {
      $high = $pivot -1;
    }
  }

  $dissatisfaction = [abs($A_sorted[$pivot] - $B_rating)];
  if ($pivot > 0) {
    $dissatisfaction[] = abs($A_sorted[$pivot - 1] - $B_rating);
  }
  if ($pivot < $N-1) {
    $dissatisfaction[] = abs($A_sorted[$pivot + 1] - $B_rating);
  }

  return min($dissatisfaction);
}
?>
