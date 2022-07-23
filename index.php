<?php include "backend.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container" style="margin-top: 40px">
    <a href="month.php" class="btn btn-primary">Month</a>
    <a href="week.php" class="btn btn-primary">Week</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Row temp</th>
            <th scope="col">Modified temp</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($result[0]); $i++): ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $result[0][$i]; ?> &degC</td>
                <td><?= isset($result[1][$i]) ? $result[1][$i] : '-'; ?> &degC</td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>
</body>
</html>