<style type="text/css" media="screen">
	.red {
        color: #f44336;
    }
</style>
<div class="alert alert-info">
	<strong><?php echo get_phrase('instruksi').': '; ?></strong>
	<?php echo get_phrase('
instruksi_ini_hanya_diperlukan_untuk_mengisi_pertanyaan_jenis_kesenjangan').'. '.get_phrase('
ketika_Anda_harus_memasukkan_celah_Anda_bisa_masuk').' \'^\' '.get_phrase('untuk_mendapatkan_yang_kosong').' . '.get_phrase('anda_bisa_memeriksa_nya_di_pratinjau').'...'; ?>
</div>

<?php echo form_open(site_url('admin/manage_online_exam_question/'.$online_exam_id.'/add/fill_in_the_blanks') , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

<input type="hidden" name="type" value="<?php echo $question_type;?>">

<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('nilai');?></label>
    <div class="col-sm-8">
        <input type="number" class="form-control" name="mark" data-validate="required" data-message-required="<?php echo get_phrase('nilai_dibutuhkan');?>" min="0"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('judul_pertanyaan');?></label>
    <div class="col-sm-8">
        <textarea onkeyup="changeTheBlankColor()" name="question_title" class="form-control" id="question_title" rows="8" cols="80" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('pratinjau');?></label>
    <div class="col-sm-8">
        <div class="" id="preview"></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('kata_kata_yang_cocok');?></label>
    <div class="col-sm-8">
        <textarea name="suitable_words" class = "form-control" rows="8" cols="80" data-validate="required" data-message-required="<?php echo get_phrase('nilai_dibutuhkan');?>" placeholder="<?php echo get_phrase('area_ini_akan_berisi_kata_kata_yang_cocok_untuk_mengisi_baginan_kosong').'. '.get_phrase('tolong_tulis_kata_kata_yang_cocok_berdampingan_dipisahkan_oleh_koma'); ?>"></textarea>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('tambah_pertanyaan');?></button>
    </div>
</div>
<?php echo form_close();?>

<script type="text/javascript">
	function changeTheBlankColor() {
        var alpha = ["^"];
        var res = "", cls = "";
        var t = jQuery("#question_title").val();

        for (i=0; i<t.length; i++) {
            for (j=0; j<alpha.length; j++) {
                if (t[i] == alpha[j])
                {
                    cls = "red";
                }
            }
            if (t[i] === "^") {
                res += "<span class='"+cls+"'>"+'__'+"</span>";
            }
            else{
                res += "<span class='"+cls+"'>"+t[i]+"</span>";
            }
            cls="";
        }
        jQuery("#preview").html(res);
    }
</script>