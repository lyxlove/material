<html>
<head>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.easyui.min.js')}}"></script>
    <script  type="text/javascript" src="{{URL::asset('/layer/layer.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/default/easyui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/icon.css')}}">
    <link rel="stylesheet" href="{{url('/css/main.css')}}">
    <style type="text/css">
      .main
      {
        display:flex;
      }
      .left
      {
        flex:1;
      }
      .right
      {
        flex:5;
      }
    </style>


    <script>
  //初始化刷新控件
	$(document).ready(function() {
  var str = "{{$list}}";
  str = str.replace(/\&quot;/g,'"')
  var obj = eval('(' + str + ')');
    $('#tt').tree({
      data:obj,
      animate:true,
      onLoadSuccess:function (node,data) {

      },
      onSelect:function(node) {
        $('#typeid').val(node.id);
        GetItemList(node.id);
      }
  });

});

function GetItemList(id)
{
  $.ajax({
    url:"{{url('goods/GetGoodsList')}}"+'/'+id,
    typr:'get',
    success:function(msg) {
      eval("var list ="+msg);
    var arr = new Array('goods_name');

     mRefreshTree('tid','bid',arr,msg);

    }
  });
}


function mRefreshTree(tableId,bodyId,bodyArr,data)
{
  var dtable = document.getElementById(tableId);
  var infos = document.getElementById(bodyId);
  if(infos != null)
  {
    dtable.removeChild(infos);
  }

  infos = document.createElement(bodyId);

  infos.setAttribute("id",bodyId);
  if(data.length == 0)
  {
    infos.innerHtml = "<p>暂时没有您所要求的信息</p>";
  }
  else
  {

    eval("var list ="+data);

    for(var i = 0;i<list.length;i++)
    {
      var tr = document.createElement("tr");
      for(var j =0;j<bodyArr.length;j++)
      {
        var td = document.createElement("td");
        td.innerHTML = list[i][bodyArr[j]];
        tr.appendChild(td);
      }
      var td = document.createElement("td");
      var id = list[i]['goods_id'];
        td.innerHTML = "<a href={{url('price/edit')}}/"+id+">修改价格</a>"
      tr.appendChild(td);
      infos.appendChild(tr);
    }

  }

  dtable.appendChild(infos);
}


    </script>

</head>
<body>
  <div class="head-center">
      <ul class="bar-menu">
        <li><a href="{{url('')}}">首页</a></li>
        <li class="bar-item"><a href="#">定义</a>
        <ul class="item-content">
          <li><a href="{{url('goods/index')}}">物品类型</a></li>
          <li><a href="{{url('price/index')}}">价格</a></li>
        </ul>
        </li>
      </ul>
  </div>

  <br/>
  <br/>
  <br/>

  <div class="body-center">

<div style="margin:20px 0;"></div>

<div class="main">
  <div class="left" style="padding:5px">
    <ul id="tt" class="easyui-tree"></ul>
  </div>
  <div class="right">
    <table id="tid">
    <thead>
      <th>物品名称</th>
      <th>来源</th>
      <th>来源</th>
    </thead>
    <tbody id="bid">

    </tbody>
    </table>
  </div>
  </div>
  </div>
</body>
</html>
