<table class="table table-horvered table-striped table-bordered" id="datatable" width="100%">
	<thead class="text-center bg-gray">
		<tr>
			<td>No</td>
			<td>Id Kelompok</td>
			<td>Kelompok</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach ($data as $key): $no++; ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$key->id_kelompok?></td>
				<td><?=$key->kelompok?></td>			
				<td>
				<a href="javascript:ubahdata('<?=$key->id_kelompok?>','<?=$key->kelompok?>')" class='btn-warning btn-sm'>
					<i class='fas fa-pencil-alt mr-1'></i>&nbsp;Ubah</a>&nbsp;
				<a href="javascript:hapus('<?=$key->id_kelompok?>','<?=$key->kelompok?>')" class='btn-danger btn-sm'><i class='fas fa-trash'></i>&nbsp;Hapus</a>
				</td>
				
				
			</tr>
		<?php  endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#datatable').DataTable( {
            scrollY:        "400px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            'searching': false,
            columnDefs: [
                { orderable: false, targets: 3 }
            ],
            order: [[1, 'asc']]  
              
          } ); 
	});
</script>