<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$pagetype = $_GET['type'] ?? "";
$session = session(); ?>
<script type="text/JavaScript">
    <!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script type="text/javascript" src="<?= base_url("admin_assets/nicEdit.js") ?>"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
    });
</script>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Kelola Halaman</h2>

                <div class="row">
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">Form Kelola Halaman</div>
                            <div class="panel-body">
                                <form method="post" name="chngpwd" action="<?= base_url("admin/halaman/update") ?>" class="form-horizontal" onSubmit="return valid();">
                                    <?php if ($session->getFlashdata("pesan")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("pesan")); ?> </div><?php } ?>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Pilih Halaman</label>
                                        <div class="col-sm-4">
                                            <select name="menu1" class="form-control" onChange="MM_jumpMenu('parent',this,0)">
                                                <option value="" selected="selected" class="form-control">***Pilih Halaman***</option>
                                                <option value="<?= base_url("admin/halaman") ?>?type=terms">Terms and Conditions</option>
                                                <option value="<?= base_url("admin/halaman") ?>?type=privacy">Privacy and Policy</option>
                                                <option value="<?= base_url("admin/halaman") ?>?type=aboutus">About Us</option>
                                                <option value="<?= base_url("admin/halaman") ?>?type=faqs">FAQs</option>
                                                <option value="<?= base_url("admin/halaman") ?>?type=rekening">Rekening</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Halaman Terpilih</label>
                                        <div class="col-sm-4">
                                            <?php
                                            switch ($pagetype) {
                                                case "terms":
                                                    echo "<input type='text' class='form-control' value='Terms and Conditions' readonly>";
                                                    break;
                                                case "privacy":
                                                    echo "<input type='text' class='form-control' value='Privacy And Policy' readonly>";
                                                    break;
                                                case "aboutus":
                                                    echo "<input type='text' class='form-control' value='About US' readonly>";
                                                    break;
                                                case "faqs":
                                                    echo "<input type='text' class='form-control' value='FAQs' readonly>";
                                                    break;
                                                case "rekening":
                                                    echo "<input type='text' class='form-control' value='Rekening' readonly>";
                                                    break;
                                                default:
                                                    echo "<input type='text' class='form-control' value='' readonly>";
                                                    break;
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Detail Halaman</label>
                                        <?php
                                        $db = \Config\Database::connect();

                                        $data = $db->table("tblpages")->where("type", $pagetype)->get()->getFirstRow();
                                        ?>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="5" cols="50" name="pgedetails" id="pgedetails" placeholder="Package Details" required>
											<?php
                                            echo htmlentities($data->detail ?? "");
                                            ?>
											</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-4">
                                            <input type="hidden" name="type" value="<?= $pagetype ?>">
                                            <button type="submit" name="submit" value="Update" id="submit" class="btn-primary btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>
<?= $this->endSection() ?>