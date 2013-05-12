// JavaScript Document
$(document).ready(function(){


setInterval(function(){get_chat_messages();},1000);

$("input#chat_message").keypress(function(e){
if(e.which == 13 ){
		$("#post_button").click();
		return false;
		}
	});
	
	
	
	
	$("#post_button").click(function(){
		
	var chat_message_content=$("#chat_message").val();
	
	  
	if(chat_message_content==""){
		return false;
		}
		
	$.post(base_url+"user/ajax_add_chat" ,{ sender_id : sender_id , receiv_id : receiv_id , chat_message_content : chat_message_content }, function(data){



			},"json");
			$("#chat_message").val("");
			
		return false;
			
		
		});
		
			
		////////////////////////////////////////
		
		function get_chat_messages(){
		
        
		$.post(base_url +"user/ajax_get_chat_messages",{sender_id : sender_id , receiv_id : receiv_id }, function(data){
			if(data.status == 'ok'){
				$(".chat_box").html(data.content);
				}else{
					//there was an error 
					$(".chat_box").html(data.content);
					}
			},"json");
			
			
	
	
		}
		
		/////////////////////////////////////////////
		
		///////////////////////////////////////////////
		
		
		
		///////////////////////////////////////////
		get_chat_messages();
		
	
		
		
		
	
		});
	
		