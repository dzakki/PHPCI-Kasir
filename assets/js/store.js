$(document).ready(function () {
	var base_url = "http://localhost/ci_kasir/";

	$('body').on('click', '.btn-edit-user', function() {
		var id = $(this).attr('id');
		var role = $(this).attr('data-role');
		$('#modal-edit-user [type="hidden"]').val(id);
		$('#modal-edit-user [name="level"] [value="'+role+'"] ').prop('selected', true);
		$('#modal-edit-user').modal('show');
	})

	$('body').on('click', '.btn-edit-drink', function() {
		var id = $(this).attr('id');
		var name = $(this).attr('data-name');
		var price = $(this).attr('data-price');
		var discount = $(this).attr('data-discount');
		var stok = $(this).attr('data-stok');
		$('#modal-edit-drink [type="hidden"]').val(id);
		$('#modal-edit-drink [name="name"]').val(name);
		$('#modal-edit-drink [name="price"]').val(price);
		$('#modal-edit-drink [name="discount"]').val(discount);
		$('#modal-edit-drink [name="stok"]').val(stok);
		$('#modal-edit-drink').modal('show');
	})

	$('body').on('click', '.btn-edit-table', function() {
		var id = $(this).attr('id');
		var status = $(this).attr('data-status');
		var chair = $(this).attr('data-chair');
		$('#modal-edit-table [type="hidden"]').val(id);
		$('#modal-edit-table [name="status"] [value="'+status+'"] ').prop('selected', true);
		$('#modal-edit-table [name="chair"]').val(chair);
		$('#modal-edit-table').modal('show');
	})

	

	$('body').on('click', '.cart', function() {
		var id = $(this).attr('id');
		$('#modal-cart').modal('show');
		$('#modal-cart #input-hidden').val(id);
	});
	$('body').on('click', '.get_order', function() {
		$('#modal-order').modal('show');
		var id = $(this).attr('id');
		$.ajax({
			url: base_url+'store/get_order',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function (data) {
				var list  = $('#list_order') ;
				var html = "";
				for (var i = 0; i < data.length; i++) {
					html += "<tr><td>"+(i + 1)+"</td><td>"+data[i].nama_minuman+"</td><td>"+data[i].jumlah_minuman+"</td><td>"+data[i].harga+"</td></tr>";
				}
				list.html(html);
			}
		})
		
	});
})