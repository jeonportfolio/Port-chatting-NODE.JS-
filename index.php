<?php
	include "conn.php";

	if(isset($_SESSION["kakao_member_code"]) == false || !$_SESSION["kakao_member_code"]) { //로그인하지 않았을 때..
		?>
			<script>
				location.replace("login.php");
			</script>
		<?php
		exit;
	}

	//$_SESSION["kakao_member_code"]; 로그인 USER CODE
	//$_SESSION["kakao_member_alias"] 로그인 alias
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8" />
	<title>카카오톡</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<style>
		.divFriendTr {
			height:33px;
			display:inline-block;
			line-height:33px;
			vertical-align:middle;
			padding-top:6px;
			padding-bottom:6px;
			padding-left:14px;
			margin:0px;
			width:calc(100% - 14px);
			clear:both;
		}

		.divChatTr {
			min-height:33px;
			display:inline-block;
/*			line-height:33px;*/
			vertical-align:middle;
			padding-top:6px;
			padding-bottom:6px;
			padding-left:10px;
			margin:0px;
			width:calc(100% - 10px);
			float:left;
			clear:both;
			font-size:13px
		}

		.divChatTrMy {
			min-height:33px;
			display:inline-block;
/*			line-height:33px;*/
			vertical-align:middle;
			padding-top:6px;
			padding-bottom:6px;
			padding-right:30px;
			margin:0px;
			width:calc(100% - 30px);
			float:right;
			clear:both;
			font-size:13px
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Mustache CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/0.1/mustache.min.js"></script>
	<script>

			$(document).ready(function(){
				loadMemberList();
			});

			function loadMemberList() {
					//1. 데이터베이스의 회원 정보를 읽어 json 객체 형태로 받는 것
					$.ajax({
					  type: 'POST',  
					  url: "getMemberList.php",
					  data: {},
					  dataType : 'text',
					  cache: false,
					  async: false
					})
					.done(function( result ) {
					  //성공했을때
					  	$("#divChatOrMember").load("member.php", function(){
					    MEMBER_ROOM_MODE = "MEMBER";
						let memberList = {"MEMBER": JSON.parse(result)};
					
						//2. 받은 내용을 무스타크로 출력하는 것
						var output = Mustache.render($("#divMemberList").html(), memberList);	
						$("#divMemberList").html(output);	
					
						$('.class_icon').css('color', '#909297'); 
						$("#icon_member").css('color', 'black');
					  });
					})
					.fail(function( result, status, error ) {
							//실패했을때
							alert("에러 발생:" + error);
					});
			}		


		    function openChat() {
				$("#MAIN").css("left",($(document).width() + 100)); //MAIN 창을 안보이게 해줌 
				$("#MAIN").load("chat.php", function(){
				$("#MAIN").animate({left:0, top:0});
				});//다시 MAIN창의 재설정 
			}
			
		

		
	</script>

</head>
<body style="margin:0px">
<div style="width:100%; display:inline-block; height:630px; padding:0px; margin:0px; position:relative; left:0px; top:0px" id="MAIN">
		<div style="width:20%; display:inline-block; height:100%; background-color:#ececed; padding:0px; padding-top:10px; margin:0px; text-align:center; float:left">
			<i class="fas fa-user" style="font-size: 28px; color:#909297"></i>

		</div>
		<div style="width:76%; display:inline-block; height:100%; background-color:#ffffff; padding:0px; margin:0px; padding-top:10px; float:left ">
			<div style="width:100%; height:30px; padding:0px; margin:0px; color:black; padding-left:14px">
				친구
			</div>
			<div style="width:100%; height:calc(100% - 30px); padding:0px; margin:0px; margin-bottom:-30px; color:black; overflow-y:auto" id="divMemberList">
			{{#MEMBER}}
						{{#alias}}
							<div class="divFriendTr">
								<div style="float:left">
									<img src="{{userIcon}}" style="width:33px; height:33px">
								</div>
								<div style="float:left; margin-left:7px">
									{{alias}}
								</div>
							</div>
						{{/alias}}
			{{/MEMBER}}
			
					
			</div>
		</div>
	</div>

	<div style="width:0%; height:0px; padding:0px; margin:0px; position:relative; left:0px; top:0px" id="BACKGROUND">
	</div>

	
</body>
</html>