<?php 
$doc = <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>运维程序</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <div id='app'>
    	<div class="container">
        <h2 class="m-2">运维程序</h2>
        <hr>
    	<div class="border rounded p-2 m-2">
        	<h5>输入:</h5>
        	<input placeholder="请输入项目英文缩写或者项目名称" class="form-control" v-model="keyword" required/>
            <hr>
            <input type="button" class="btn btn-primary" v-on:click='onSearch' value="查询">
        </div>
        <div class="border rounded p-2 m-2">
        	<h5>输出:</h5>
        	<div v-html='msg'></div>
        </div> 
        <div class="border rounded p-2 m-2">
        <h5>说明:</h5>
        <ul>项目开始前可以通过此脚本检查项目简写,例如这个名字是不是已经用过了,这个项目的命名是否和微沙盘的一致等等;下面是几种可能的情况:
        	<li> 异常情况 :
            <ul>
        	<li>如果你是新建项目,然后发现你要新建的项目已经有信息了，出现这种情况的话需要联系  <i style='color:green'>管理员-崔跃 </i>，确认一下已有项目和你要新建的项目是不是一个项目.</li>
            <li>如果你是已有项目,然后发现你的项目查不到信息了，出现这种情况的话需要联系  <i style='color:green'>管理员-崔跃 </i></li>
            <li>如果你是新建 unity 项目,然后发现这个项目<i style='color:red'>没有</i> 微沙盘的信息,如果你的项目需要用到微沙盘项目，这种情况需要联系 <i style='color:green'>管理员-崔跃.</i></li>
            <li>如果你是新建 unity 项目,然后发现这个项目<i style='color:red'>有</i> 微沙盘的信息,如果你的项目需要用到微沙盘项目，这种情况请使用 <i style='color:green'>微沙盘</i> 项目的英文简写.</li>
            <li>任意项目,发现没有中文名,请联系 <i style='color:green'>管理员-崔跃 </i>添加中文名.</li>
            <li>其他程序问题联系  <i style='color:green'>管理员-崔跃 </i> 微信号码: a1062903887</li>
            </ul>
            </li>
            <li> 正常情况 :
            <ul>
            <li>新建项目查不到信息</li>
            <li>新建项目,不需要微沙盘,查不到微沙盘的信息</li>
            </ul>
            </li>
            <li> 备注 :
            <ul>
            <li>微沙盘项目新建时发现已有unity项目， 命名建议与<i style='color:green'>unity </i>保持一致</li>
            </ul>
            </li>
        </ul>
        </div>
        </div>
        
    </div>
</body>
<script>
var app = new Vue({
  el: '#app',
  data: {
    keyword: '',
    msg:''
  },
  methods: {
    onSearch:function(){
		var that = this;
        var keyword = that.keyword;
        var url =  '/operations/index.php?method=onSearch&keyword='+keyword;
        axios.get(url)
            .then(function (response) {
                var status = response.data.status;
				var msg = response.data.msg;
                switch(status){
                	case 0:
                    	msg = '<ul><li>不存在这个项目!</li></ul>';
                        break;
                    case 1:
                    	msg = msg;
                        break;
                    case 2:
                    	msg = msg;
                        break;
                    case 3:
                    	msg = msg;
                        break;
                }
                
                that.msg = msg;
             	console.log(status);
            })
            .catch(function (error) {
            console.log(error);
        });
    }
  }
})


</script>
</html>
EOF;
/*
* 更新数据功能
*/


/*
* 搜索页功能
*/
function onSearch(){
		  $req = array('status'=>0,'msg'=>'<ul>');
          $con = mysql_connect("123.56.93.238","root","alpha");
          if (!$con){
              die('Could not connect: ' . mysql_error());
          }
          mysql_select_db("unity", $con);
          $query = mysql_query("SELECT count(id) as count FROM unity_node WHERE name = '".$_GET['keyword']."' OR alias ='".$_GET['keyword']."'");
          $res = mysql_fetch_array($query);
          if($res['count']>0) {                 	
            $query = mysql_query("SELECT name,alias FROM unity_node WHERE name = '".$_GET['keyword']."' OR alias ='".$_GET['keyword']."'");
             $res = mysql_fetch_array($query);
            $req['status'] = $req['status']+1;$req['msg'].='<li>unity 项目:<ul><li>中文名:'.$res["alias"].';</li><li>英文简写:'.$res["name"].'</li></ul></li>'; 
          } 
          mysql_close($con);
  		///www/wwwroot/www.alphavisual.cn/newUnity
  		$product = include_once 'product.php';

  		$name = strtoupper($_GET['keyword']);
        foreach ($product as $val){
            if($val['name'] === $name || $val['alias'] === $name){
             	$req['status'] = $req['status']+2;$req['msg'].='<li>微沙盘项目:<ul><li>中文名:'.$val["alias"].';</li></li>英文简写:'.$val["name"].'</li></ul></li> ';
            }
        }
          $con = mysql_connect("123.56.93.238","root","alpha");
          if (!$con){
              die('Could not connect: ' . mysql_error());
          }
          $query = mysql_query("select count(SCHEMA_NAME) as count from information_schema.SCHEMATA where SCHEMA_NAME ='".$_GET['keyword']."'");
          $res = mysql_fetch_array($query);
          if($res['count']>0&& $req['status'] < 2){ 
             $query = mysql_query("select SCHEMA_NAME as name from information_schema.SCHEMATA where SCHEMA_NAME ='".$_GET['keyword']."'");
         	 $res = mysql_fetch_array($query);
           	 $req['status'] = $req['status']+2;$req['msg'].='<li>微沙盘项目; <ul><li>英文简写:'.$res["name"].'</li></ul></li> '; 
          } 
  		
  		  $req['msg'] .='</ul>'; 
          echo json_encode($req);
}
    if($_GET['keyword']){
      $_GET['keyword'] =   strtoupper($_GET['keyword']);
      switch($_GET['method']){
        case 'onSearch':
          return onSearch();
        break;
      }
    }elseif(1==1){

    }else echo $doc;
?>