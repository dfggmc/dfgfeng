<!DOCTYPE html>
<html lang="<?php echo $_COOKIE['language'] ?>">

<head>
    <?php $language_data = get_language() ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $language_data->public->site->title ?></title>
    <style>
        button {
            width: 400px;
            height: 45px;
            border: 0;
            font-size: 16px;
            box-sizing: content-box;
            border-radius: 5px;
            margin-top: 10px;

        }

        .language_button.activity {
            color: white;
            background-color: #f66f6a;
        }

        #change_language_btn {
            position: fixed;
            margin: 30px;
            bottom: 0;
            left: 0;
            z-index: 99999;
        }

        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="change_language_btn">
        <button class="language_button <?php if ($_COOKIE['language'] === 'zh-cn') {
                                            echo 'activity';
                                        } ?>" onclick="changeLanguage('zh-cn'); location.reload();">
            中文
        </button>
        <br>
        <button class="language_button <?php if ($_COOKIE['language'] === 'en-us') {
                                            echo 'activity';
                                        } ?>" onclick="changeLanguage('en-us'); location.reload();">
            English
        </button>
    </div>

    <h1><?php echo $language_data->page->home->index->title ?></h1>
    <h2><?php echo $language_data->page->home->index->description ?></h2>

    <pre>
        <code>
            <?php var_dump(get_language()) ?>   
        </code>
    </pre>

    <script>
        function changeLanguage(language) {
            document.cookie = "language=" + language + "; path=/";
        }
    </script>
</body>

</html>