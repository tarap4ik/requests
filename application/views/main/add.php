<div class="container">
    <div class="row justify-content-center">
        <div class="card mx-15 mt-5" style="width: 20rem;">
            <div class="card-header">Добавить заявку</div>
            <div class="card-body">
                <form action="/request/add" method="post">
                    <div class="form-group">
                        <p>Наименование</p>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <p>Телефон</p>
                        <input class="form-control" id="phone" type="text" name="telephone" required>
                    </div>
                    <div class="form-group">
                        <p>Описание проблемы</p>
                        <textarea class="form-control" minlength="10" name="problem" required></textarea>
                    </div>
                    <div class="form-group">
                        <p>Изображение</p>
                        <input type="file" name="pic">
                    </div>
                    <button type="submit" class="btn btn-dark">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#phone").mask("8(999) 999-9999");
    });
</script>