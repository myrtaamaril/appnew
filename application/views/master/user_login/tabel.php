<table class="table table-horvered table-striped table-bordered" id="datatable" width="100%">
	<thead class="text-center bg-gray">
		<tr>
			<td>No</td>
			<td>Full Name</td>
			<td>User Name</td>
			<td>Expired</td>
			<td>Foto</td>
			<td>Otoritas</td>
			<td>Companyname</td>
			<td>Status</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach ($data as $key): $no++; ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$key->nickname?></td>
				<td><?=$key->username?></td>			
				<td><?=$key->tglexpired?></td>
				<td><?=$key->foto?></td>
				<td><?=$key->otoritas?></td>
				<td><?=$key->companyname?></td>
				<td>
					<select class="form-control" id="st<?=$no;?>" onchange="javascript:ubahstatus('<?=$key->username?>','<?='st'.$no;?>')"> >
                        <option value="AKTIF" <?=$key->STATUS=='AKTIF'?'selected':''?>>Aktif</option>
                        <option value="TIDAK AKTIF" <?=$key->STATUS=='TIDAK AKTIF'?'selected':''?>>Tidak Aktif</option>
                    </select>
				</td>
				<td>
				<a href="javascript:ubahdata('<?=$key->username?>','<?=$key->nickname?>','<?=$key->tglexpired?>','<?=$key->otoritas?>','<?=$key->companyname?>','<?=$key->id_customer?>')" class='btn-warning btn-sm'>
					<i class='fas fa-pencil-alt mr-1'></i>&nbsp;Ubah</a>&nbsp;
				<a href="javascript:hapus('<?=$key->username?>')" class='btn-danger btn-sm'><i class='fas fa-trash'></i>&nbsp;Hapus</a>
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
                { orderable: false, targets: 7 },{ orderable: false, targets: 8	 },
            ],
            order: [[1, 'asc']]  
              
          } ); 
	});
</script>