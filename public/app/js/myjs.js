
$('.like').on('click', function(event){
	event.preventDefault();
	rep = $(this).closest("[data-replyId]").data();
	replyId = Object.values(rep);
	

	var value = $(this).data("custom-value");
	var ek = $('.like').map((_,el) => el.value).get();
	var isLike = ek != value;
	console.log(replyId[0]);

	$.ajax({
		method: 'POST',
		url: urlLike,
		data: {isLike: isLike, replyId: replyId[0], _token: token}
	})
		.done(function(){
			window.location.reload();
		});

});