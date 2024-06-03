<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan SAW</title>
</head>
<body>
    <h1>Hasil Perhitungan SAW</h1>
    
    <h2>Data Kriteria dan Bobot</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kriteria as $k => $bobot): ?>
                <tr>
                    <td><?= $k ?></td>
                    <td><?= $bobot ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <h2>Data Alternatif dan Nilai</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Alternatif</th>
                <?php foreach($kriteria as $k => $bobot): ?>
                    <th><?= $k ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alternatif as $alt): ?>
                <tr>
                    <td><?= $alt['nama'] ?></td>
                    <?php foreach($kriteria as $k => $bobot): ?>
                        <td><?= $alt[$k] ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <h2>Hasil Perhitungan SAW</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Alternatif</th>
                <?php foreach($kriteria as $k => $bobot): ?>
                    <th><?= $k ?></th>
                <?php endforeach; ?>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hasil as $h): ?>
                <tr>
                    <?php foreach($alternatif[$h['index']] as $nilai): ?>
                        <td><?= $nilai ?></td>
                    <?php endforeach; ?>
                    <td><?= $h['total'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
