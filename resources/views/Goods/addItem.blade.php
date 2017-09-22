<html>
<head>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.easyui.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/default/easyui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/demo.css')}}">
    <style type="text/css">
    </style>

    <script>

    </script>
</head>
<body>
    <form class="" action="{{url('goods/saveItem')}}" method="post">
        {!! csrf_field() !!}

        <input type="hidden" name="GoodsTypeId" value="{{$GoodsTypeId}}">

      <!--  分类名称<input type="text" name="GoodsType" value="{{isset($GoodsType) ? $GoodsType : 'Default'}}">
-->
        物品名称<input type="text" name="GoodsName" value="{{ $GoodsName or 'Default'}}">

        <input type="submit" name="" value="保存">
    </form>
</body>
</html>
