<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="{{url('api/posttest')}}" enctype="multipart/form-data">
    <input type="checkbox" name="yi[]" value="n">男
    <input type="checkbox" name="yi[]" value="y">女
    <input type="submit" value="提交">

</form>

</body>
</html>