<html>
<head>
    <style type="text/css">
    </style>

    <script>

    </script>
</head>
<body>
<form action="">
    金币价格(/100RMB):<input  id="gold" type="text"  value="{{$data['gold']}}"/>
    <ul>
        <li>每1RMB: <a>{{$data['price1']}}</a></li>
        <li>每15RMB: <a>{{$data['price15']}}</a></li>
        <li>每30RMB: <a>{{$data['price30']}}</a></li>
        <li>每50RMB: <a>{{$data['price50']}}</a></li>
        <li>每分钟: <a>{{$data['minuteprice']}}</a></li>
        <li>每小时: <a>{{$data['hourprice']}}</a></li>
    </ul>
</form>
</body>
</html>
