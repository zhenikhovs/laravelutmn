<html>
<head>
    <link rel=stylesheet href="{{asset('cssF/style.css')}}" type='text/css'>
    <title>@yield('title')</title>
</head>
<body>
<div class="header"><!--*****************Логотип и шапка********************-->
    Вакансии и резюме
    <div id="logo"></div>
</div>

@yield('content')
<div class="rightcol"><!--*******************Навигационное меню*******************-->
    <ul class="menu">
        <li><a href="/task2">Задание 2</a></li>
        <li><a href="/vacancies">Вакансии</a></li>
        <li><a href="/staff">Cписок профессий</a></li>
        <li><a href="/resumes">Резюме</a></li>
        <li><a href="/resumes/">Резюме по возрасту</a></li>
        <li><a href="/resumes/">Избранное резюме</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2017</div>

</body>
</html>
