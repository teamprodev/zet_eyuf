<style type="text/css">
    #maket {
        width: 100%; /* Ширина всей таблицы */
    }

    TD {
        vertical-align: top; /* Вертикальное выравнивание в ячейках */
        padding: 5px; /* Поля вокруг ячеек */
    }

    #spacer {
        width: 2px; /* Расстояние между колонками */
    }
</style>

<h3>Личная информация</h3>
<h2>Логин:94712634</h2>
<table cellspacing="0" id="maket">
    <tr>
        <td id="leftcol">
            <label for="first name">Имя и Отчество</label><br>
            <input type="text" id="first name" name="fname" value=""><br><br>
            <label for="last name">Фамилия</label><br>
            <input type="text" id="last name" name="lname" value=""><br><br>
            <form>
                <table cellspacing="0" id="date">
                    <tr>
                        <td id="leftcolumn">
                            <label for="m">Выберите пол</label><br>
                            <select name="gender" id="gender">
                                <option value="Мужской">Мужской</option>
                                <option value="Женский">Женский</option>
                            </select></td>
                        <td id="rightcolumn">
                            <label for="last name">Деньрождение:</label><br>
                            <input type="data" class="form" id="databirthday" placeholder="01/02/1989"><br>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
        <td id="rightcol">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQO0w6Qwo9T2rzvHPVJGl1gf4p7bZelfKFfOmlsfPtrqiOtJDTq&usqp=CAU" height="100" alt="Аватар">
            <input type="file" id="file_uploading" style="display: none;" onchange="previewFile()"/>
            <button onclick="onClickButton()">Загрузить аватарку</button>

        </td>
    </tr>
</table>

<form>
    <table cellspacing="0" id="any">
        <tr>
            <td id="lcolumn">
            <h2>Контактная информация</h2>
                <div class="form-group">
                    <label for="exampleInputTelephone">Телефон</label><br>
                    <input type="data" class="form-control" id="exampleInputTelephone" placeholder="+998(90)1234567">
                    <small id="data" class="form-text text-muted"></small>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false">Изменить
                </button>
                <br><br>
                <div class="form-group">
                    <label for="exampleInputEmail">Электронная почта</label><br>
                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="@example.com">
                </div>
                <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false">Подтвердить
                </button>
                <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false">Изменить
                </button>
            </td>
            <td id="rcolumn">
            <h2>Изменение пароля</h2>
                <div class="form-group">
                    <label for="exampleInputPassword1">Старый пароль</label><br>
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Новый пароль</label><br>
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Новый пароль ещё раз</label><br>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            </td>
        </tr>
    </table>
</form>
<button type="button" class="btn btn-primary btn-lg">Сохранить изменение</button>
<script>
    function onClickButton(){
        document.getElementById('file_uploading').click();
    }

    function previewFile() {
        var preview = document.querySelector('img');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
