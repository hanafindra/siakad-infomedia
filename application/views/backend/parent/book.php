<hr />
<div class="row">
    <div class="col-md-12">

        <!---CONTROL TABS START-->
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('daftar_buku');?>
                        </a></li>
        </ul>
        <!---CONTROL TABS END-->


        <div class="tab-content">
        <br>
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="books">
                    <thead>
                        <tr>
                            <th width="40"><div><?php echo get_phrase('id_buku');?></div></th>
                            <th><div><?php echo get_phrase('nama');?></div></th>
                            <th><div><?php echo get_phrase('penulis');?></div></th>
                            <th><div><?php echo get_phrase('deskripsi');?></div></th>
                            <th><div><?php echo get_phrase('harga');?></div></th>
                            <th><div><?php echo get_phrase('kelas');?></div></th>
                            <th><div><?php echo get_phrase('unduh');?></div></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!--TABLE LISTING ENDS-->
        </div>
    </div>
</div>


<script type = 'text/javascript'>
    jQuery(document).ready(function($) {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#books').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url('parents/get_books') ?>",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [
                { "data": "book_id" },
                { "data": "name" },
                { "data": "author" },
                { "data": "description" },
                { "data": "price" },
                { "data": "class" },
                { "data": "download" },
            ],
            "columnDefs": [
                {
                    "targets": [1,2,4,5,6],
                    "orderable": false
                },
            ]
        });
    });
</script>
