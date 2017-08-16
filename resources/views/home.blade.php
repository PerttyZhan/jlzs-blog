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
    <table>
        <tr>
            <th>
                大标题
            </th>
            <td>
                <input type="text" name="headline" />
            </td>
        </tr>
        <tr>
            <th>
                小标题
            </th>
            <td>
                <input type="text" name="title"/>
            </td>
        </tr>
        <tr>
            <th>
                署名
            </th>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <th>
                权重
            </th>
            <td>
                <input type="text" name="weight">
            </td>
        </tr>
        {{--<tr>--}}
            {{--<th>--}}
                {{--头图--}}
            {{--</th>--}}
            {{--<td>--}}
                {{--<input type="file" name="img_src">--}}
            {{--</td>--}}
        {{--</tr>--}}
        <tr>
            <th>

            </th>
            <td>
                <input type="radio" name="sort_id" value="1">类别一
                <input type="radio" name="sort_id" value="2">类别二
                <input type="radio" name="sort_id" value="3">类别三
            </td>
        </tr>
        <tr>
            <th>

            </th>
            <td>
                <input type="checkbox" name="tag_id[]" value="1">标签一
                <input type="checkbox" name="tag_id[]" value="2">标签二
                <input type="checkbox" name="tag_id[]" value="3">标签三
            </td>
        </tr>

        <tr>
            <th>
                文章内容
            </th>
            <td>
                <input type="text" name="content">
            </td>
        </tr>

        <tr>
            <th>

            </th>
            <td>
                <input type="submit" value="提交">
            </td>
        </tr>
    </table>
</form>

</body>
</html>