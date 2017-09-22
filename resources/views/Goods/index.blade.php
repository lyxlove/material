<html>
<head>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/easyui/jquery.easyui.min.js')}}"></script>
    <script  type="text/javascript" src="{{URL::asset('/layer/layer.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/default/easyui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/easyui/themes/icon.css')}}">


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
    var arr = new Array('GoodsName');

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
      infos.appendChild(tr);
    }

  }

  dtable.appendChild(infos);
}

//添加物品类型
function AddType() {
  var pid = $('#typeid').val();
  if(pid == '')
  {
    pid = 0;
  }
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

//添加物品
function AddMaterial() {
  var pid = $('#typeid').val();
  if(pid == '')
  {
    pid = 0;
  }
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

  <input id="typeid" type="hidden" name="typeid">
  <button id="btnType" type="button" onclick="AddType()" name="">添加分类</button>
  <button id="btnMaterial" type="button" onclick="AddMaterial()" name="">添加材料</button>

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
    </thead>
    <tbody id="bid">

    </tbody>
    </table>
  </div>
  </div>

</body>
</html>
