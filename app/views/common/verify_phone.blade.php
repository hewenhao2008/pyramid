<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>焚盟|确认手机号</title>
<link rel="stylesheet" href="{{ URL::asset('css/faqi.css') }}">
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui">
</head>
<body id="body1">
	<div class="reg_main">
  		<p class="reg_p1">欢迎加入焚盟<br/>现在开始创造属于你的江湖法则</p>
        <p class="reg_p2">验证您的手机号码</p>
        <form action="" method="get">
        	<div class="red_phone">
            	<input type="text" name="phone" class="phone" value="手机号码" onfocus="if(this.value=' 手机号码') this.value = ''" onblur="if(this.value == '') this.value = ' 手机号码'"  name='numb'/>
                <input type="button" value="发送验证码" class="send" status='1'/>    
            </div>
            <input type="text" value="输入六位验证码" onfocus="if(this.value=' 输入六位验证码') this.value = ''" onblur="if(this.value == '') this.value = ' 输入六位验证码'"  name='verify_code' class="code"/>
            
            <input type="button" value="注册" class="reg_btn"/>
        </form>
    </div>

    <script>
        var send_button   = $('.send');
        var regist_button = $('.reg_btn');

        function countDown(){
            var second     = 30;
            var status     = send_button.attr('status',0);
            var _countDown = setInterval(function(){
                second = second - 1;
                if (second == 0) {
                    send_button.attr('status',1).val('重新发送');
                    clearInterval(_countDown);
                }
                else{
                   send_button.val(second);
                };

            },1000);
        }

        function sendVerifyCode(phone_num){
           var url = "{{ URL::to('verify_phone') }}";
           $.post(url,{phone_num:phone_num},function(data){
               console.log(data);
               if (data.code) {  
                    alert('验证码已经发送,请注意查收');
               }else{
                    alert('验证码发送失败,请稍后重试');
               };
           });
        }

        function getVerifyCode(){
            var url = "{{ URL::to('getVerifyCode') }}";
            $.ajaxSetup({async :false});
            var verify_code_server = '000000';
            $.post(url,function(data){
                verify_code_server = data.verify_code;
            });
            return verify_code_server;
        }

        send_button.click(function(){
            var status = send_button.attr('status');
            var phoneNum = $('input[name="phone"]').val();
            if (status == 1) {
                countDown();
                sendVerifyCode(phoneNum);
            }
            // console.log(getVerifyCode());
        });

        regist_button.click(function(){
            var verify_code_input  = $('input[name="verify_code"]').val();
            var verify_code_server = getVerifyCode();
            var phoneNum           = $('input[name="phone"]').val();
            if (verify_code_input == verify_code_server) {
                var url = "{{ URL::to('item/create') }}";
                location.href = url;
            }else{
                alert('验证失败,请重新获取');
            };
        });

    </script>

</body>
</html>
