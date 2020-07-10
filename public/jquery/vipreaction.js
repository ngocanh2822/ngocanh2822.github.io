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
			let filename = 'vip'+tam+'.txt'; 
			$.get('vipreaction/'+filename, function(data) {
			   $("#vipcontent").append(data)
			}, 'text');
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
			thanhtien = thanhtien + kq;
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
			thanhtien = thanhtien - kq;
		}
	$('.thanhtoan').html(thanhtien);
});


$('.max').on({
  click: function() {
	console.log(1);
  },
  keyup: function() {
	console.log(2);
  }
});