<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="{{URL::asset('css/faqi.css')}}" rel="stylesheet" type="text/css" />
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src='http://res.wx.qq.com/open/js/jweixin-1.0.0.js'></script>
<script src='{{URL::asset("js/validate.js")}}'></script>
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui">
<script type="text/javascript">
    $(function(){

        function addImages(urlobj){
            var img_num = $('.tu img').length;

            var urlarr = Array.prototype.slice.call(urlobj);

            var add_num = urlarr.length;

            var val_num = 6 - img_num;

            if (add_num <= val_num) {
                val_num = add_num;
            };

            for (var i = val_num - 1; i >= 0; i--) {
               
                wx.uploadImage({
                    localId: urlarr[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                    isShowProgressTips: 1, // 默认为1，显示进度提示
                    success: function (res) {
                        var serverId = res.serverId; // 返回图片的服务器端ID
                        $.post('{:U("Admin/getPicture")}',{mediaId:serverId},function(data){
                             text = $('textarea#test').text();
                             var img = "<img src="+data+">";
                             $('.tu').append(img);
                         });
                    }
                });

               $('.tu img').click(function(){
                    $(this).remove();
                });
            };
           
        }

        // 点击上传图片
        $('#upload').click(function(){
            wx.chooseImage({
                success: function (res) {
                    var localIds = res.localIds;
                    addImages(localIds);
                }
            });
        });



        $('#confirm').click(function(){
            var images = $('.tu img');
            var i = 0;
            var localIds = [] ;
            images.each(function(i){
                localIds[i] = images.attr('src');
            });
            
            function upload(){
               
                 wx.uploadImage({
                    localId: localIds[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                    isShowProgressTips: 1, // 默认为1，显示进度提示
                    success: function (res) {

                        var serverId = res.serverId; // 返回图片的服务器端ID
                        $.post('{:U("Admin/getPicture")}',{mediaId:serverId},function(data){
                             text = $('textarea#test').text();
                             $('textarea#test').text(text+"<br/>"+data);
                         });

                        i = i + 1 ;
                        if (i < localIds.length) {
                            upload();
                        }else{
                            return false;
                        };
                    }
                });
            }

            upload();
             
            wx.uploadImage({
                    localId: localId, // 需要上传的图片的本地ID，由chooseImage接口获得
                    isShowProgressTips: 1, // 默认为1，显示进度提示
                    success: function (res) {
                        var serverId = res.serverId; // 返回图片的服务器端ID
                    }
            });
        });

    });

</script>
<title>焚盟|选择帮派|魔派</title>
</head>
<body id="body1">
    <div class="item_box">
        <div class="bt">
            <img src="{{URL::asset('images/1.png')}}" class="bt_r">
            <p class="law">江湖法则</p>
            <img src="{{URL::asset('images/2.png')}}" class="bt_l">
        </div>
        
        <div class="law_text">
                    <p>
                        都市的生活里没有江湖？
                        <br/>现代的生活里没有侠义？错！                           
                        <br/> 只要加入梵盟，
                        <br/>在这里都可以实现。
                        <br/>你只要选择你的派系，
                        <br/>就可以聚义你的兄弟。
                        <br/>让天下风云因你而起伏。
                        <br/>让江湖格局因你而改变。
                        <br/>江湖的法则，不讲究万里独行。
                        <br/>江湖的法则，不鼓励一人兴邦。
                        <br/>江湖的法则，是贤良聚义。
                        <br/>江湖的法则，是侠客并行。
                        <br/>是英雄，就来铸造属于你的江湖法则！
                      </p>
         </div>
         
         <div class="bt">
            <img src="{{URL::asset('images/1.png')}}" class="bt_r">
            <p class="law">确定派系</p>
            <img src="{{URL::asset('images/2.png')}}" class="bt_l">
        </div>
        
        <div class="lx">
            
            <div class="item_mm choose" target='z'>正派---极颜面膜</div>
            <div class="item_mm choose focus" target='m'>魔派---燃魅瘦身</div>
            <script>    
                var link_z = "{:U('Item/chooseFaction',array('faction'=>'z'))}";
                var link_m = "{:U('Item/chooseFaction',array('faction'=>'m'))}";
                $('.choose').click(function(){
                    var choose = $(this).attr('target');
                    if (choose == 'z') {
                        location.href = link_z;
                    }else if(choose == 'm'){
                        location.href = link_m;
                    };
                });
            </script>
            <p class="item_p1">选择你中意派系！！！</p>
        </div>
        
        <div class="bt">
            <img src="{{URL::asset('images/1.png')}}" class="bt_r">
            <p class="law">帮派构架</p>
            <img src="{{URL::asset('images/2.png')}}" class="bt_l">
        </div>
        
        <div class="lx">
            
           
            <div class="item_mm faction focus" id='m_faction_0'>{:C('m_faction_0.name')} （￥{:C('m_faction_0.amount')}）</div>
            <div class="item_mm faction" id='m_faction_1'>{:C('m_faction_1.name')} （￥{:C('m_faction_1.amount')}）</div>
            <div class="item_mm faction" id='m_faction_2'>{:C('m_faction_2.name')} （￥{:C('m_faction_2.amount')}）</div>
            <div class="item_mm faction" id='m_faction_3'>{:C('m_faction_3.name')} （￥{:C('m_faction_3.amount')}）</div>
            <p class="item_p1">抉择你中意的级别！！！</p>
        </div>
        
        <div class="bt">
            <img src="{{URL::asset('images/1.png')}}" class="bt_r">
            <p class="law">筹募时间</p>
            <img src="{{URL::asset('images/2.png')}}" class="bt_l">
        </div>
        <form action="" method="get">
            <input type="text" class="item_input" name='days' placeholder='几日可招满你的良贤'/>
        </form>
         <p class="item_p1">最多7天完成招募！</p>
        
        <div class="bt">
            <img src="{{URL::asset('images/1.png')}}" class="bt_r">
            <p class="law">级别选择</p>
            <img src="{{URL::asset('images/2.png')}}" class="bt_l">
        </div>  
        
        <div class="lx">
            <div class="item_mm item focus" id='m_item_0'>{:C('m_item_0.name')} （￥{:C('m_item_0.amount')}）</div>
            <div class="item_mm item" id='m_item_1' style='display:none'>{:C('m_item_1.name')} （￥{:C('m_item_1.amount')}）</div>
            <div class="item_mm item" id='m_item_2' style='display:none'>{:C('m_item_2.name')} （￥{:C('m_item_2.amount')}）</div>
            <div class="item_mm item" id='m_item_3' style='display:none'>{:C('m_item_3.name')} （￥{:C('m_item_3.amount')}）</div>
            <p class="item_p1">抉择你中意的帮派构架（可多选）！</p>
        </div>
        <div class="bt">
            <img src="{{URL::asset('images/1.png')}}" class="bt_r">
            <p class="law">派系介绍</p>
            <img src="{{URL::asset('images/2.png')}}" class="bt_l">
        </div>
        
        <form action="" method="get">
            <input type="text" class="item_input" name='title' placeholder='帮派（级别）名称+招募标题'/>
            <textarea class="item_js" name='intro' placeholder='用江湖的方式，介绍你的帮派。招募你的兄弟' id='test'></textarea>           
        <p class="item_p1">最多可输入800字！</p>  
        </form>
        
        <div class="item_tu">
            <div class="tu">
                
            </div>
            <div class="sc" id='upload'>点击上传图片</div>
            <!-- <div class="sc" id='confirm'>确认上传</div>       -->
        </div>
        
       <div class="bt">
            <img src="{{URL::asset('images/1.png')}}" class="bt_r">
            <p class="law">用户须知</p>
            <img src="{{URL::asset('images/2.png')}}" class="bt_l">
        </div> 
        
        <textarea class="xz" readonly>　　用户在参加本次创江湖服务之前，请务必仔细阅读本条款并同意本声明。
　　用户直接或通过各类方式（如微信公众平台、朋友圈、先下活动介绍等）或间接使用创江湖和数据的行为，都将被视作已无条件接受本声明所涉全部内容；若用户对本声明的任何条款有异议，请停止创江湖活动提供的全部服务。
　　参与者不得以任何方式利用创江湖活动直接或间接从事违反中国法律、以及社会公德的行为，且用户应当恪守下述承诺：
   1. 发布、转载或提供的内容必须符合中国法律、社会公德；（个人行为与梵亚曼（北京）国际贸易有限公司无关）
   2. 不得干扰、损害和侵犯众扬汇的各种合法权利与利益；
   3. 遵守创江湖活动规则以及与之相关的网络服务的协议、指导原则、管理细则等；
   梵雅曼（北京）国际贸易有限公司有权对违反上述承诺的内容予以删除。
   本次活动最终解释权归--梵雅曼（北京）国际贸易有限公司--所有。
        </textarea>
        <div class="yt">
            <form action="" method="get">
              <input type="checkbox" class="fx" name='agree'><a class="item_p2">阅读并同意此条款</a>
            </form>
        </div>
         
         <div class="item_btn">一起创江湖</div>
         <script type="text/javascript">
            var create_item_link = '__URL__/createItem';
            var base_info_complete_link = '{:U("User/baseInfoComplete")}';
         </script>
         <script type="text/javascript" src='{{URL::asset("js/getItem.js")}}'></script>
    </div>
</body>
</html>
