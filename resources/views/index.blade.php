<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <form method="post" action="{{url('api/posttest')}}"  enctype="multipart/form-data">

      <table>

          <tr>
              <th>大标题</th>
              <td>
                  <input type="text" name="headline">
              </td>
          </tr>
          <tr>
              <th>小标题</th>
              <td>
                  <input type="text" name="title">
              </td>
          </tr>
          <tr>
              <th>图片</th>
              <td>
                  <input type="file" name="file[]" id="file" multiple="multiple">

              </td>
          </tr>
          <tr>
              <th>头图</th>
              <td>
                  <input type="file" name="mantle[]" id="mantle" multiple="multiple">
              </td>
          </tr>
          <tr>
              <th>新闻内容</th>
              <td>
                  <textarea style="height: 100px" name="news_content">

                  </textarea>
              </td>

          </tr>



      </table>

        <input type="submit" value="提交">
    </form>

</div>

</body>
</html>