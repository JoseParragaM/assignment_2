<!-- testing branch -->
<?php
$a = isset($_GET['a']) ? $_GET['a'] : null;
$b = isset($_GET['b']) ? $_GET['b'] : null;
$c = isset($_GET['c']) ? $_GET['c'] : null;

$a_esc = escapeshellarg($a);
$b_esc = escapeshellarg($b);
$c_esc = escapeshellarg($c);

$cmd  = "python3 calculate.py $a_esc $b_esc $c_esc";
$json = shell_exec($cmd);
$data = json_decode($json, true);

if (!$data || isset($data['error'])) {
    die("Calculation error: " . ($data['error'] ?? ''));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Assignment #2</title>
  <style>
    body { font-family: monospace; background: #fdebd0; padding: 20px; }
    h1 { color: darkgreen; }
    .result { font-weight: bold; }
    pre { background: #eee; padding: 10px; border-left: 5px solid green; }
    .timestamp { font-style: italic; margin-top: 10px; }
  </style>
</head>
<body>
  <hr>
  <h1>Assignment #2</h1>
  <p class="name">Jose Parraga</p>
  <p class="result">Final Result: <?php echo htmlspecialchars($data['result']); ?></p>

  <pre>
Step 1: c = <?php echo $data['c']; ?> , c³ = <?php echo $data['c_cubed']; ?>

Step 2: √(c³) = <?php echo $data['sqrt_c3']; ?>

Step 3: <?php echo $data['sqrt_c3']; ?> / <?php echo $data['a']; ?> = <?php echo $data['divided']; ?>

Step 4: <?php echo $data['divided']; ?> * 10 = <?php echo $data['multiplied']; ?>

Step 5: <?php echo $data['multiplied']; ?> + <?php echo $data['b']; ?> = <?php echo $data['result']; ?>
  </pre>

  <div class="timestamp">
    Calculation completed at <?php echo $data['timestamp']; ?>
  </div>
  <hr>
</body>
</html>
