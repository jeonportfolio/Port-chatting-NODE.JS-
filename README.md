# 카카오톡 웹 버전 구현 

- NODE.js 웹소켓 기능 -> 다자간 실시간 대화 구현 <br>
- 모든 동작에 동적처리 -> 화면 깜박임 없음 (앱으로 활용가능)<br>
- 템플릿 엔진인 Mustache 활용 <br>
- `fontawesome.com`으로 아이콘 디자인 구현<br>


## 아키텍쳐 

- 서버측 -> NODE.js , PHP, MYSQL 개발은 XAMPP를 통해 실서비스는 node.js<br>
- XAMPP에서 apache-> php mysql은 데이터 베이스를 담당 -> heidiSQL사용<br>
- 클라이언트 측 ->HTML CSS javascript 제이쿼리 <br>
- 기타기술 -> Mustache Font Awesome<br>

## 로그인 

- 세션을 활용 -> 컴퓨터와 서버와의 관계 (보관한 값을 다시 가져다쓴다)<br>
- php로 작성 font-awesome과 jquery 그리고 mustache를 cdn 방식으로 가져온다. <br>
- java script를 통해 sql에 저장되어있는 유저 정보를 가져옴 -> ajax를 사용해 JSON형식으로 가져온다. -> 동기방식 사용 <br>
- php에서 데이터베이스 스키마 정의한 후 정보를 SQL문을 통해 result값으로 받아오고 JSON 형태로 변환 시킴<br>

## 로그인 과정 세분화

- login.php에서 아이디 입력후 -> login_ok.php -> index.php로 이동하는 과정 <br>
- conn.php에서 데이터 연결정보<br>
- 로그인 정보가 없다면 다시 로그인 페이지로 보냄 <br>

## conn.php

- HediSQL을 연결하기 위한 정보 

## Index.php

- Main페이지와 Background 페이지로 나눈다. -> 메인페이지에 디자인이 들어감 <br>
- 친구목록 icon과 font Awesome 사용 -> 유저 아이콘과 이름 <br>
- 친구를 클릭하며 해당 채팅방을 오른쪽에서 왼쪽으로 나오는 애니메이션 (openChat())<br>



## Chat.php 

- 상대방과 나의 채팅내용을 보여주는 페이지 (나와 상대방의 대화내용을 구분한다.)<br>

