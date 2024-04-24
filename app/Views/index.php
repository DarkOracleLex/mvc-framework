<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Телефонный справочник</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
            font-family: sans-serif;
            font-weight: 100;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        table {
            flex-basis: 80%;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        th {
            text-align: left;
        }

        thead {
            th {
                background-color: #55608f;
            }
        }

        tbody {
            tr {
                &:hover {
                    background-color: rgba(255, 255, 255, 0.3);
                }
            }

            td {
                position: relative;

                &:hover {
                    &:before {
                        content: "";
                        position: absolute;
                        left: 0;
                        right: 0;
                        top: -9999px;
                        bottom: -9999px;
                        background-color: rgba(255, 255, 255, 0.2);
                        z-index: -1;
                    }
                }
            }
        }

        form {
            box-sizing: border-box;
            width: 800px;
            display: flex;
            flex-direction: column;
            padding: 10px;
            background-color: rgb(255, 255, 255);
            border: unset;
            border-radius: 4px;
        }

        input {
            box-sizing: border-box;
            font-size: 16px;
            line-height: 28px;
            padding: 8px 16px;
            width: 100%;
            min-height: 44px;
            border: unset;
            border-radius: 4px;
            outline-color: rgb(84 105 212 / 0.5);
            background-color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px;
        }
    </style>
</head>
<body>
<div class="container">
    <table class="mx-auto">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Номер</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($contacts)):
            foreach ($contacts as $key => $contact):
                ?>
                <tr>
                    <td><?php echo $contact->name ?></td>
                    <td><?php echo $contact->phone ?></td>
                    <td style="padding: 0;">
                        <a style="display:block; width: 100%;" href="contact/delete?id=<?php echo $key ?>">X</a>
                    </td>
                </tr>
            <?php
            endforeach;
        endif;
        ?>

        </tbody>
    </table>

    <form method="post" action="contact/add" class="mt-4 mx-auto">
        <div class="form-group">
            <label for="name">
                Имя
            </label>
            <input id="name" name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input id="phone" name="phone" type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Создать контакт</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
