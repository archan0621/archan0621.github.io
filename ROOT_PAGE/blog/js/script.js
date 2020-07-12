$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

function checkJoinForm(){
	var username = $("#register_name").val();
	var useremail = $("#register_email").val();
	var userpw = $("#register_pw").val();	
	var userpw2 = $("#register_pw2").val();	
	if( ! username ) {
		alert("이름은 필수입니다.");
		$("#register_name").focus();
		return false;
	}
	if( ! useremail ) {
		alert("Email은 필수입니다.");
		$("#register_email").focus();
		return false;
	}
	if( ! userpw ) {
		alert("비밀번호는 필수입니다.");
		$("#register_pw").focus();
		return false;
	}
	if( ! userpw2 ) {
		alert("비밀번호 확인은 필수입니다.");
		$("#register_pw2").focus();
		return false;
	}
	if( userpw != userpw2 ) {
		alert("비밀번호와 비밀번호 확인이 다릅니다.");
		$("#register_pw2").focus();
		return false;
	}
	return true;
}

$(".list-photo img").click(function(){
	var src = $(this).attr("src");
	var img = document.createElement("img");
	img.src = src;
	var obj = $("#photo-pop");
	obj.html(img);
	obj.css("position","absolute");
	obj.css("top", Math.max(0, (($(window).height() - obj.outerHeight()) / 2) + $(window).scrollTop()) + "px");
	obj.css("left", Math.max(0, (($(window).width() - obj.outerWidth()) / 2) + $(window).scrollLeft()) + "px");
	obj.show();
});

$("#photo-pop").click(function(){
	$(this).hide();
});

$("#photo").change(function(){
	preView(this);
});

function preView(photo) {
	if( ! photo.files ) return;
	var reader = new FileReader();
	reader.onload = function(event){
		var src = event.target.result;
		if(src) {
			var img = document.createElement("img");
			img.src = src;
			$("#preview").html(img);
		}
	};
	reader.readAsDataURL(photo.files[0]);
}

function delBlog(id) {
	if( ! id ) return;
	if( ! confirm("정말 삭제할까요?") ) return;
	$("#del-form").submit();
}