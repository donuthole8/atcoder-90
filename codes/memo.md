# memo

execute
```
$ php 001.php {arg1} {arg2} ...
```

template
```template.php
<?php
  /* 標準入力に値を与えるのが面倒なので、コマンドライン引数から受け取る */
  //list($a, $b, $c) = sscanf(fgets(STDIN), "%d %d %d");
  $a = intval($argv[1]); $b = intval($argv[2]); $c = intval($argv[3]);
  if(sqrt($a) + sqrt($b) < sqrt($c))
    print("Yes\n");
  else
    print("No\n");

  return ;
?>
```

標準入力から配列取得
```getStdinArray.php
while ($line = fgets(STDIN)) {
    $tmp[] = trim($line);
}
foreach ($tmp as $value) {
    $A[] = explode(' ', $value);
}
```