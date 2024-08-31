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
									<div style="float:left; margin-left:7px" onclick="openChat('{{memberCode}}','{{alias}}');">
										{{alias}}
									</div>
								</div>
							{{/alias}}
						{{/MEMBER}}
			</div>