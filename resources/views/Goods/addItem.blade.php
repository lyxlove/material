<html>
<head>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.easyui.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/default/easyui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/demo.css')}}">

        <link rel="stylesheet" href="{{url('/css/main.css')}}">
    <style type="text/css">
    </style>

    <script>

    </script>
</head>
<body>
  <div class="head-center">
      <ul class="bar-menu">
        <li><a href="{{url('')}}">首页</a></li>
        <li class="bar-item"><a href="#">定义</a>
        <ul class="item-content">
          <li><a href="{{url('goods/index')}}">物品类型</a></li>
        </ul>
        </li>
      </ul>
  </div>

  <br/>
  <br/>
  <br/>

  <div class="body-center">
    <form class="" action="{{url('goods/saveItem')}}" method="post">
        {!! csrf_field() !!}

        <input type="hidden" name="type_id" value="{{$type_id}}">

      <!--  分类名称<input type="text" name="GoodsType" value="{{isset($GoodsType) ? $GoodsType : 'Default'}}">
-->
        物品名称<input type="text" name="goods_name" value="{{ $goods_name or ''}}">

        <input type="submit" name="" value="保存">
    </form>
  </div>
</body>
</html>
