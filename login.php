<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minium-scale=1.0,maximum-scale=1.0">
    <title>로그인</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/0.1/mustache.min.js"></script>
    <script>
		$(document).ready(function() {
			loadMemberList();
		});

		function loadMemberList() {
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
                    let memberList = {"MEMBER": JSON.parse(result)};

					var output = Mustache.render($("#divMemberList").html(), memberList);	
					$("#divMemberList").html(output);	
                    //mustache연동 
			   })
				.fail(function( result, status, error ) {
						//실패했을때
						alert("에러 발생:" + error);
			   });
		}

		function login() {
			if(!document.getElementById("ddlMemberList").value) {
				alert("아이디를 선택해 주세요");
				return false
			}
			document.frm.submit();
		}
	</script>

</head>
<body style="margin:0px">
    <div style ="width:100%; display:inline-block; height:630px; padding:0px; margin:0px">
		 	<form name=frm method=post action="login_ok.php">
				<div style = "text-align:center; width:100%; margin-top:50px;" id= "divMemberList">
                    <select name="ddlMemberList" id= "ddlMemberList">
                        <option value="">아이디 선택</option>
                        {{#MEMBER}}
						    	{{#alias}}
						    		<option value="{{memberCode}}">{{alias}}</option>
						    	{{/alias}}
						{{/MEMBER}}


                    </select>
            	</div>
			</form>
            <div style = "text-align:center; width:100%; margin-top:20px">
                    <button onclick = "login();">로그인하기</button>
            </div>
    </div>
    
</body>
</html>