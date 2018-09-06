<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-3 text-center">
            <?php if (!empty($_SESSION['id']) && ($_SESSION['user'] == 'admin')): ?>
                <a href="/request/xml" class="btn btn-outline-info btn-lg" role="button"
                   aria-pressed="true">XML</a>
            <?php endif; ?>
        </div>
        <div class="col-sm-3 text-center">
            <?php if (!empty($_SESSION['id'])): ?>
                <a href="/request/add" class="btn btn-outline-info btn-lg" role="button" aria-pressed="true">Добавить</a>
            <?php endif; ?>
        </div>
        <div class="col-sm-3 text-center">
            <?php if (empty($_SESSION['id'])): ?>
                <a href="/request/login" class="btn btn-outline-info btn-lg" role="button"
                   aria-pressed="true">Вход</a>
            <?php else: ?>
                <a href="/request/logout" class="btn btn-outline-info btn-lg" role="button"
                   aria-pressed="true">Выход</a>
            <?php endif; ?>
        </div>
    </div>
        <div class="col-lg-8 col-md-12 pt-2 mx-auto">
            <div class="card">
            <?php if (empty($orders)): ?>
                <p>Список заявок пуст или не доступен</p>
            <?php else: ?>
                <ul class="list-group list-group-flush">
                    <?php foreach ($orders as $value): ?>
                        <li class="list-group-item <?php if ($_SESSION['last'] == $value['id']): ?>list-group-item-info<?php endif; ?>">
                            <a style="text-decoration: none;" href="/request/view/<?php echo $value['id']; ?>">
                                <?php echo $value['name'] ?>
                                <?php if (!empty($_SESSION['id']) && ($_SESSION['user'] == 'admin')): ?> от
                                <?php echo $value['username'] ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
