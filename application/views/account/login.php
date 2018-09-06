<div class="container">
    <div class="row justify-content-center">
        <div class="card mx-1 mt-5" style="width: 18rem;">
            <div class="card-header">Вход</div>
            <div class="card-body">
                <form action="/OrderProject/login" method="post">
                    <div class="form-group">
                        <p>Логин</p>
                        <input class="form-control" type="text" name="login">
                    </div>
                    <div class="form-group">
                        <p>Пароль</p>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Вход</button>
                </form>
            </div>
        </div>
    </div>
</div>