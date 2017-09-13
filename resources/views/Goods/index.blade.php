<html>
<head>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.easyui.min.js')}}"></script>
    <script  type="text/javascript" src="{{URL::asset('/layer/layer.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/default/easyui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/icon.css')}}">


    <style type="text/css">
    </style>

    <script>

	$(document).ready(function() {
  var str = "{{$list}}";
  str = str.replace(/\&quot;/g,'"')
  var obj = eval('(' + str + ')');
    $('#tt').tree({
      data:obj,
      animate:true,
      onLoadSuccess:function (node,data) {
        console.log(data);
      },
      onSelect:function(node) {
        $('#typeid').val(node.id);
      }
  });
});

function AddType() {

  var pid = $('#typeid').val();
  if(pid == '')
  {
    pid = 0;
  }
 // window.location.href = "{{url('goods/addtype')}}"+'/'+pid;
 layer.open({
    type: 2,
    title: '添加物品',
    maxmin: true,
    area: ['800px', '500px'],
    content:"{{url('goods/addtype')}}"+'/'+pid,
    end: function(){
      layer.tips('Hi', '#about', {tips: 1})
    }
  });
}

function AddMaterial() {
  var pid = $('#typeid').val();
  if(pid == '')
  {
    pid = 0;
  }
 //window.location.href = "{{url('goods/addItem')}}"+'/'+pid;
 layer.open({
    type: 2,
    title: '添加物品',
    maxmin: true,
    area: ['800px', '500px'],
    content:"{{url('goods/addItem')}}"+'/'+pid,
    end: function(){
      layer.tips('Hi', '#about', {tips: 1})
    }
  });
}


    </script>

</head>
<body>

  <input id="typeid" type="text" name="typeid">
  <button id="btnType" type="button" onclick="AddType()" name="">添加分类</button>
  <button id="btnMaterial" type="button" onclick="AddMaterial()" name="">添加材料</button>

  <div style="margin:20px 0;"></div>

  <div class="easyui-panel" style="padding:5px">
    <ul id="tt" class="easyui-tree"></ul>
  </div>

</body>
</html>
