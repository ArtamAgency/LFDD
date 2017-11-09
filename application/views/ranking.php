<?php $this->load->view('header') ?>
<body>
    <h1>Classement</h1>
    <div class="col-md-8 col-md-offset-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($ranking as $row): ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['user_name']; ?></td>
                    <?php if($row['enigme_id'] == 10): ?>
                        <td><?= $row['enigme_id']*10; ?></td>
                    <?php else: ?>
                        <td><?= ($row['enigme_id']-1)*10; ?></td>
                    <?php endif ?>
                    <?php $i++; ?>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>