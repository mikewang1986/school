<?php
use yii\helpers\Html;
use app\models\xsmart\XsmartSysConfig;
$config=new app\models\xsmart\XsmartSysConfig();
$siteconfig=$config->getallconfig();
if(!is_null($siteconfig)){
    foreach($siteconfig as $models=>$model){
        if($model->key=="site_name"){
            $site_name=$model->value;
        }
        if($model->key=="site_keyword"){
            $site_keyword=$model->value;
        }
        if($model->key=="site_meat"){
            $site_meat=$model->value;
        }
    }
}
$asset = \app\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->language ?>">
    <meta property="qc:admins" content="254647636026375" />
    <meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
    <meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
    <title><?php echo $site_name;?></title>
    <meta name="keywords" content="<?php  echo $site_keyword;?>" />
    <meta name="description" content="<?php echo  $site_meat;?>" />
    <link rel="stylesheet" type="text/css" href="<?= $asset->baseUrl ?>/css/head.css" />
    <link rel="stylesheet" type="text/css" href="<?= $asset->baseUrl ?>/css/foot.css" />
    <link href="/css/jquery.alerts.css" rel="stylesheet" />
    <meta name="baidu-tc-verification" content="bbf97a97d2668dce1ed093cba54014e6" />
    <script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
    <!-- 滚动图片 -->
    <!--  <script type="text/javascript" src="js/jQuery.v1.8.3-min.js"></script>-->
    <script type="text/javascript" src="<?= $asset->baseUrl ?>/js/jquery-1.7.2.min.js"></script>
    <script src="<?= $asset->baseUrl ?>/js/jquery.alerts.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= $asset->baseUrl ?>/js/jquery1.42.min.js"></script>
    <script type="text/javascript" src="<?= $asset->baseUrl ?>/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript">
        var InterValObj; //timer变量，控制时间
        var count = 60; //间隔函数，1秒执行
        var curCount;//当前剩余秒数
        function sendMessage() {
            var usr		= $("#usr").val();
            var pwd 	= $("#pwd").val();
            var pwd1 	= $("#pwd1").val();
            var nk_name = $("#nk_name").val();
            var telReg = usr.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
            curCount = count;
            if(usr!='' && pwd!='' && pwd1 != '' && nk_name != '' && telReg && pwd == pwd1){
                //设置button效果，开始计时
                //向后台发送处理数据
                $.ajax({
                    url:'<?= URL('login.send_code')?>',
                    type:'POST',
                    data:{
                        username	:	usr,
                    },
                    success:function(r){
                        e = eval('(' + r + ')');
                        if(e.status == '1'){
                            //jAlert(e.info,'温馨提示');
                            $("#btnSendCode").attr("disabled", "true");
                            $("#btnSendCode").val(curCount + "秒后重新发送");
                            InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                            //$("#register1").css('display','');
                        }else{
                            jAlert(e.info,'温馨提示');
                        }
                    }
                });
            }else if(usr == ''){
                jAlert('请填写手机号','温馨提示');
            }else if(pwd == ''){
                jAlert('请填写密码','温馨提示');
            }else if(pwd != pwd1){
                jAlert('密码不一致','温馨提示');
            }else if(nk_name == ''){
                jAlert('请填写昵称','温馨提示');
            }else if(!telReg){
                jAlert('请填写合理手机号','温馨提示');
            }
        }
        //timer处理函数
        function SetRemainTime() {
            if (curCount == 0) {
                window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode").removeAttr("disabled");//启用按钮
                $("#btnSendCode").val("重新发送");
            } else {
                curCount--;
                $("#btnSendCode").val(curCount + "秒后重新发送");
            }
        }
    </script>
    <!-- 选项卡 -->
    <script>
        function setTab(name,cursel,n){
            for(i=1;i<=n;i++){
                var menu=document.getElementById(name+i);
                var con=document.getElementById("con_"+name+"_"+i);
                menu.className=i==cursel ? "hover" : "";
                //con.style.display=i==cursel ? "block" : "none";
                if(con.style.display=i==cursel){
                    $(con).fadeIn();
                }else{
                    con.style.display = "none";
                }
            }
        }
    </script>
    <!-- 点击左右滑动 -->
    <script type="text/javascript" src="<?= $asset->baseUrl ?>/js/jq.Slide.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#temp4").Slide({
                effect : "scroolLoop",
                autoPlay:true,
                speed : "normal",
                timer : 3000,
                steps : 1
            });
        });
    </script>
    <!-- 图片显示div -->
    <script type="text/javascript" src="<?= $asset->baseUrl ?>/js/tc.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            t = $('.top').offset().top; //固定块距离窗口顶部位置
            $(window).scroll(function(e){
                s = $(document).scrollTop();	//滚动条距离顶部高度
                if( s > t){
                    $('.top').css('position','fixed');
                    $('.top').css('top',0+'px');
                    $('#left_class').fadeOut();
                }else{
                    $('#left_class').fadeIn();
                    $('.top').css('position','');
                }
            })
        });

    </script>
    <link rel="stylesheet" type="text/css" href="<?= $asset->baseUrl ?>/css/index1.css" />
    <link rel="stylesheet" media="screen" type="text/css" href="<?= $asset->baseUrl ?>/css/new-index.css"/>
    <link rel="stylesheet" href="<?= $asset->baseUrl ?>/css/swiper.min.css">
    <style>
        .swiper-container {
            width: 100%;
            min-width:1190px;
            height: 502px;
            position:relative;
            max-width:1440px;
            /*background:url(images/zr.gif) no-repeat center center;*/
        }
        .swiper-slide {
            text-align: center;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        .swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet{width: 11px;height: 11px;text-align: center;margin:9px 10px;background:url(images/img_20.png) no-repeat;}
        .swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet-active{position: relative;background:url(images/img_21.png) no-repeat;}
    </style>
    <!--百度异步统计代码-->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?4449a883d67a851a47b40dd00c604602";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
    <body>
        <?php $this->beginBody() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>