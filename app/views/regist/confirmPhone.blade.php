<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>焚盟|确认手机号</title>
{{ HTML::style('css/faqi.css') }}
{{ HTML::script('js/jquery.min.js')}}
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
            <input type="text" value="输入六位验证码" onfocus="if(this.value=' 输入六位验证码') this.value = ''" onblur="if(this.value == '') this.value = ' 输入六位验证码'"  name='numb' class="code"/>
            
            <input type="button" value="注册" class="reg_btn"/>
        </form>
    </div>

    <script>
        var send_button = $('.send');

        function countDown(){
            var second = 5;
            var status = send_button.attr('status',0);
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

        function sendVerifyCode(phoneNum){
            var url = "{{ URL::route('sendVerifyCode')}}"+'/'+phoneNum;
            console.log(url);
        }

        send_button.click(function(){
            var status = send_button.attr('status');
            var phoneNum = $('input[name="phone"]').val();
            if (status == 1) {
                countDown();
                sendVerifyCode(phoneNum);
            }
        });

    </script>

</body>
</html>
