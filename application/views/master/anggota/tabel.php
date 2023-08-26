<table class="table table-horvered table-striped table-bordered" id="datatable" width="100%">
	<thead class="text-center bg-gray">
		<tr>
			<td>No</td>
			<td>No.anggota</td>
			<td>Nama</td>
			<td>Tanggal Daftar</td>
			<td>Tanggal Lahir</td>
			<td>Alamat</td>
			<td>Status</td>
			<td>Keterangan</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach ($data as $key): $no++; ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$key->noanggota?></td>
				<td><?=$key->nama?></td>	
				<td><?=$key->tanggal_daftar?></td>	
				<td><?=$key->tanggal_lahir?></td>	
				<td><?=$key->alamat?></td>	
				<td><?=$key->status?></td>	
				<td><?=$key->Keterangan?></td>				
				<td>
				<a href="javascript:ubahdata('<?=$key->id_anggota?>','<?=$key->noanggota?>','<?=$key->nama?>','<?=$key->tanggal_daftar?>','<?=$key->tanggal_lahir?>','<?=$key->alamat?>','<?=$key->status?>','<?=$key->Keterangan?>')" class='btn-warning btn-sm'>
					<i class='fas fa-pencil-alt mr-1'></i>&nbsp;Ubah</a>&nbsp;
				<a href="javascript:hapus('<?=$key->id_anggota?>','<?=$key->noanggota?>')" class='btn-danger btn-sm'><i class='fas fa-trash'></i>&nbsp;Hapus</a>
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
                { orderable: false, targets: 8 }
            ],
            order: [[1, 'asc']]  
              
          } ); 
	});
</script>