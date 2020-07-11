// $("#like").click = function(){
// 	$.get('file_like.txt', function(data) {
// 	   $("#vipcontent").append(data)
// 	}, 'text');
// 	
// }

let thanhtien=0;
let mlike=0;
$('.emotion').on('click', function(){
	let id = this.id;	
	let tam = id;
		if ($('#'+tam).attr('clicked') == 'no')
		{
			let filename = 'vip'+tam+'.html'; 
			$.get('vipreaction/'+filename, function(data) {
			   $("#vipcontent").append(data);
			   var fkeydown = document.getElementsByClassName("fmax");
			   for (var i = 0; i < fkeydown.length; i++) {
			   		fkeydown[i].onkeyup = function(){count()};
			   		fkeydown[i].onclick = function(){count()};
			   }
			   $("#slbai").on({
				  keyup: function(){
				   count();
				  },
				  click: function(){
				    count();
				  }
				});
			   $("#slngay").on({
				  keyup: function(){
				   count();
				  },
				  click: function(){
				    count();
				  }
				});
			   count();
			   	// var fmax = document.getElementsByClassName("fmax");
			   	// for (var i = 0; i < fmax.length; i++) {
			   	// 	if (fmax[i].id == 'maxlike') {
			   	// 		dongia =30;
			   	// 	}
			   	// 	else{
			   	// 		dongia =80;
			   	// 	}
			   	// 	thanhtien = thanhtien + fmax[i].value*dongia*$('#slbai').val()*$('#slngay').val();
			   	// 	console.log(thanhtien);
			   	// 	$('.thanhtoan').html(thanhtien);
			   	// }
				//console.log(thanhtien);
			}, 'text');
			//console.log(thanhtien)
			$('#'+tam).css('transform','scale(1.2)');
			//$('#camxuc'+tam).html('<input type="text" name="camxuc'+tam+'" value="'+tam+' " hidden="true" >');
			$('#'+tam).attr('clicked', 'ok');
			// $('#f'+tam).css('display', 'flex');
			maxlike = $('#max'+tam).val();
			if(tam == 'like' )
			{
				dongia=30;
			} else dongia=80;
			kq=$('#max'+tam).val()*dongia*$('#slbai').val()*$('#slngay').val();
			//thanhtien = thanhtien + kq;
		}
		else if ($('#'+tam).attr('clicked') == 'ok')
		{
			$('#f'+tam).remove();
			$('#'+tam).css('transform','scale(1)');
			$('#'+tam).attr('clicked', 'no');
			// $('#f'+tam).css('display', 'none');
			if(tam == 'like' )
			{
				dongia=30;
			} else dongia=80;
			kq=$('#max'+tam).val()*dongia*$('#slbai').val()*$('#slngay').val();
			
		}
		count();
});
function count(){
	var thanhtien =0;
	var fmax = document.getElementsByClassName("fmax");
		for (var i = 0; i < fmax.length; i++) {
	   		if (fmax[i].id == 'maxlike') {
	   			dongia =30;
	   		}
	   		else{
	   			dongia =80;
	   		}
	   		if (fmax[i].value>=50 & $('#slbai').val()>0 & $('#slngay').val()>0) {
	   			var kq=0;
	   			kq = fmax[i].value*dongia*$('#slbai').val()*$('#slngay').val();
	   			thanhtien = thanhtien + kq;
	   			console.log(thanhtien);
	   		}
	   		
	}
	$('.thanhtoan').html(thanhtien);
}


