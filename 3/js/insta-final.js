var token = '4903487647.4eec902.f2d19fbaa8084c50883f4480a8b70dae',
    username = 'ecpm_sur',
    num_photos = 9;

//Añadimos la imagen de carga en el contenedor
$('#insta-grid').html('<div class="center-align" style="padding-top: 100px"><img src="images/gears.svg"></div>');

$.ajax({
	url: 'https://api.instagram.com/v1/users/search',
	dataType: 'jsonp',
	type: 'GET',
	data: {access_token: token, q: username},
	success: function(data){
		console.log(data);
		$.ajax({
			url: 'https://api.instagram.com/v1/users/' + data.data[0].id + '/media/recent',
			dataType: 'jsonp',
			type: 'GET',
			data: {access_token: token, count: num_photos},
			success: function(data2){
				console.log(data2);
				for(x in data2.data){
					if (data2.data[x].type == "image"){
						$('#insta-grid').append('<li><img src="'+data2.data[x].images.standard_resolution.url+'"><a target="_blank" href="'+data2.data[x].link+'" class="instalink"><div class="caption right-align"><h3>'+data2.data[x].caption.text+'</h3><h4 class="light grey-text text-lighten-3"><i class="fa fa-heart"></i>&nbsp;'+data2.data[x].likes.count+'&emsp;<i class="fa fa-comment"></i>&nbsp;'+data2.data[x].comments.count+'</h4></div></a></li>');
					}else{
						$('#insta-grid').append('<li><img src="'+data2.data[x].images.standard_resolution.url+'"><a target="_blank" href="'+data2.data[x].link+'" class="instalink"><div class="caption right-align"><h3>'+data2.data[x].caption.text+'</h3><h4 class="light grey-text text-lighten-3"><i class="fa fa-play"></i>&nbsp;<i class="fa fa-heart"></i>&nbsp;'+data2.data[x].likes.count+'&emsp;<i class="fa fa-comment"></i>&nbsp;'+data2.data[x].comments.count+'</h4></div></a></li>');			}
				}
				$('.slider').slider({height:600});
    			},
			error: function(data2){
				console.log(data2);
			}
		});
	},
	error: function(data){
		console.log(data);
	}
});