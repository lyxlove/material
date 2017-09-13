<html>
<head>
    <style type="text/css">
    </style>

    <script>

    </script>
</head>
<body>
<form action="{{url('home/gold')}}" method="post">
    {!! csrf_field() !!}
    金币价格(/100RMB):<input  id="gold" name="gold" required="required" type="text"  />

    <button>提交</button>
</form>
</body>
</html>