$(function(){
	//var oLogin = document.getElementById('check_login');
	$('#check_login').click (function(){
		check_login();
	})
	$("body").keydown(function(){
		if(event.keyCode=="13"){
			$('#oLogin').click = function(){
				alert(1);
				check_login();
			}
		}
	})

})

/**
 *   返回值：
 *   	1：登录成功
 *		2：用户不存在
 *		3：密码错误
 *		4：账户被冻结
 */
/*syu1998290001.my3w.com*/

function check_login(){
	var user = document.getElementById('inputEmail3').value;
	var passwd = document.getElementById('inputPassword3').value;
	$.ajax({
			"url":"http://localhost/fakephpcms/index.php/login/Check_Login",
			"type":"post",
			"cache":false,
			"data":{'User':user,'Passwd':passwd},
			"dataType":"json",
			"success":function(result){
				//alert(result);
				if(result == 1)
				{
					window.location.href="http://localhost/fakephpcms/index.php/home";
				}else if(result == 2){
					str = '用户不存在';
				}else if(result == 3){
					str = '密码错误';
				}else if(result == 4){
					str = '账户被冻结';
				}
				$("#error").html(str);
			},
			"error":function(){
				alert('用户名或密码错误');
			},
			})
}
