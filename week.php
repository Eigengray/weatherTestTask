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
    <a href="index.php" class="btn btn-primary">Year</a>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"># day</th>
                    <th scope="col">Row temp</th>
                </tr>
                </thead>
                <?php for($i = 0; $i < count($resultWeek['row']); $i++): ?>
                    <?php for($j = 0; $j < count($resultWeek['row'][$i]); $j++): ?>
                        <tr>
                            <td><?= $j + 1; ?></td>
                            <td><?= $resultWeek['row'][$i][$j]; ?> &degC</td>
                        </tr>
                    <?php endfor; ?>
                <?php endfor; ?>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Modified temp</th>
                </tr>
                </thead>
                <?php for($i = 0; $i < count($resultWeek['modified']); $i++): ?>
                    <?php for($j = 0; $j < count($resultWeek['modified'][$i]); $j++): ?>
                        <tr>
                            <td><?= $resultWeek['modified'][$i][$j]; ?> &degC</td>
                        </tr>
                    <?php endfor; ?>
                <?php endfor; ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>