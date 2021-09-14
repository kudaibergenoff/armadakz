<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>@yield('title')</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#000">
    <!-- Custom Browsers Color End -->

</head>

<body>
@yield('content')
</body>

<style>
    ::placeholder {
        color: #666;
    }

    ::selection {
        background-color: #d60019;
        color: #fff;
    }

    html {
        font-size: 14px;
    }

    body {
        font-size: 14px;
        min-width: 320px;
        position: relative;
        line-height: 1.65;
        font-family: 'Helvetica Neue', 'Arial', sans-serif;
        overflow-x: hidden;
        background-color: #f1f1f1;
    }

    a {
        color: #d60019;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    @media screen and (max-width: 576px) {
        html {
            font-size: 12px;
        }
        h2 {
            font-size: 16px;
        }
        .sm-width-100 {
            display: block;
            width: auto;
        }
        .sm-px-0 {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .header-logo {
            width: 125px;
        }
    }

</style>

</html>
