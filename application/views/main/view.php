<div class="container">
    <div class="row justify-content-center pt-5">
        <a href="/OrderProject/" class="btn btn-outline-info btn-sm" style="margin-right: 234px;" role="button" aria-pressed="true"><<<Назад</a>
    </div>
    <div class="row justify-content-center">
        <div class="card mt-2" style="width: 20rem;">
            <div class="card-header"><h2><?php echo $data[0]['name']; ?></h2></div>
            <div class="card-body">
                <form action="/OrderProject/view/<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <p>Телефон: <?php echo $data[0]['telephone']; ?></p>
                    </div>
                    <div class="form-group">
                        <p>Описание проблемы: <?php echo $data[0]['problem']; ?></p>
                    </div>
                    <div class="form-group">
                        <img style="width: 286px;"
                             src='/OrderProject/public/materials/<?php echo $data[0]['id']; ?>.jpg'
                             onerror="this.style.display = 'none'">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>