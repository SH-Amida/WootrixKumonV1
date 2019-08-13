<script src="js/jquery.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- Load jQuery and the validate plugin -->  
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

<!-- Define some CSS -->
<style type="text/css">
    .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    add_subadmin.error, .output {color:#FFFFFF;font-weight:bold;}
</style>


<script>
    $(document).ready(function() {
        $("#rejection-report").click(function() {
            $(".layer-bg").fadeIn();
        });

        $(".close-bttn, .layer-bg-popupOverlay").click(function() {
            $(".layer-bg").fadeOut();
        });
    });
</script>

<script>
    /* GET LANGUAGE ID AND FETCH LANGUAGE DATA*/

    function LanguageData(val,catId,langId,rowId) {
        window.location.href="<?php echo base_url();?>index.php/customer_reviewarticle?catagory="+catId+"&lang="+val+"&rowId="+rowId;
    }

  /* SORT CATAGORY DATA*/
  
   function CatagoryData(val,catId,langId,rowId1) {   
        window.location.href="<?php echo base_url();?>index.php/customer_reviewarticle?catagory="+val+"&lang="+langId+"&rowId="+rowId1;
        //$('#catagory_form').submit();
    }
   
    
    /*Delete a article*/
function DELETE(rowId)
    {
       var disable = confirm("<?php echo $this->lang->line("Are_you_sure_want_to_delete_this_record"); ?>");
        if (disable === true)
        {
            var msg = '';
            $.ajax({
                type: "POST",
                data: {val: rowId},
                dataType: "html",
                url: "<?php echo $this->config->base_url(); ?>index.php/deletemagzineads",
                success: function(data)
                { //alert(data);
                    location.reload();
                }
            });
        
    }}
    
    /*SEND FOR REVIEW*/
    function SENDFORREVIEW(rowId)
    {
       var disable = confirm("<?php echo $this->lang->line("Are_you_sure_want_to_review_this_record"); ?>");
        if (disable === true)
        {
            var msg = '';
            $.ajax({
                type: "POST",
                data: {val: rowId},
                dataType: "html",
                url: "<?php echo $this->config->base_url(); ?>index.php/sendforreview",
                success: function(data)
                { //alert(data);
                    location.reload();
                }
            });
        
    }}
    
    /*RESTORE ARTICLE*/
    function RESTORE(rowId)
    {
       var disable = confirm("<?php echo $this->lang->line("Are_you_sure_want_to_restore_this_record"); ?>");
        if (disable === true)
        {
            var msg = '';
            $.ajax({
                type: "POST",
                data: {val: rowId},
                dataType: "html",
                url: "<?php echo $this->config->base_url(); ?>index.php/restorearticle",
                success: function(data)
                { //alert(data);
                    location.reload();
                }
            });
        
    }}
    
    /*Permanent Delete*/
    function SHIFTDELETE(rowId)
    {
       var disable = confirm("<?php echo $this->lang->line("Are_you_sure_want_to_delete_this_record"); ?>");
        if (disable === true)
        {
            var msg = '';
            $.ajax({
                type: "POST",
                data: {val: rowId},
                dataType: "html",
                url: "<?php echo $this->config->base_url(); ?>index.php/shiftdeletearticle",
                success: function(data)
                { //alert(data);
                    location.reload();
                }
            });
        
    }}

/* GET ADMIN DETAILS AJAX*/
    function getRejactionDetails(val1) {

        var tid1 = val1;
        //alert(tid1);
        $.ajax({
            type: "POST",
            data: {Id: tid1},
            url: "<?php echo $this->config->base_url(); ?>index.php/rejectionReport",
            success: function(data)
            {
                //console.log(data);
                $(".popUpDiv").show();
                $(".popUpDiv").html(data);
            }

        });

    }



</script>
</head>

<?php
$lang = $_GET['lang'];
$catagory = $_GET['catagory'];
?>

<div class="subheader">
     <div class="fix-container clearfix">
        <h4><?php echo $magazine_title['title']." ("."$all_article".")"; ?></h4>
        <a class="add-new" readonly='true' href="addcustomerarticle?mag=<?php echo$_REQUEST['rowId']; ?>">Add New</a>
    
    </div>
</div>

<nav class="clearfix">
    <div class="fix-container clearfix"><?php //echo"<pre>"; print_r($_REQUEST); ?>
        <ul>
            <li><a href="customer_articlelist?rowId=<?php echo$_REQUEST['rowId']; ?>"><?php echo $this->lang->line('All') ?> <span class="blue"><?php echo $all_article; ?></span></a></li>
            <li><a href="customer_publisharticle?rowId=<?php echo$_REQUEST['rowId']; ?>"><?php echo $this->lang->line('Published') ?> <span class="green"><?php echo $magazine_publish_article; ?></span></a></li>
            <li><a href="customer_draftarticle?rowId=<?php echo$_REQUEST['rowId']; ?>"><?php echo $this->lang->line('Draft') ?> <span class="yellow"><?php echo $magazine_draft_article; ?></span></a></li>
            <li class="active"><a href="customer_reviewarticle?rowId=<?php echo$_REQUEST['rowId']; ?>"><?php echo $this->lang->line('Review') ?> <span class="green"><?php echo $magazine_review_article; ?></span></a></li>            
            <li><a href="customer_deletearticle?rowId=<?php echo$_REQUEST['rowId']; ?>"><?php echo $this->lang->line('Deleted') ?> <span class="red"><?php echo $magazine_deleted_article; ?></span></a></li>
            
        </ul>
    </div>
</nav>


<div class="fix-container clearfix">
<!--    <div class="upper_bar clearfix filter-bar"> 
        <div class="search-bar right-align-box">    
            <div class="language-filter clearfix">
                <div class="select-container">
                    <div class="select-arrow">
                        <div class="arrow-down"></div>
                    </div>
                    <?php //echo"<pre>";  print_r($magazine_id) ;  ?>                    
                    <form id="languge_form" action="<?php echo $this->config->base_url() ?>index.php/magazinearticlelist?rowId=<?php echo $magazine_id;?>" method="POST">
                        <select class="choose-lang" onChange="LanguageData(this.value,'<?php echo $_GET['catagory'] ?>','<?php echo $_GET['lang'] ?>','<?php echo $_GET['rowId'] ?>');" name="lang" id="lang">
                            <option value="" name=""><?php echo $this->lang->line('Select_Language') ?></option>
                            <?php foreach ($language_result as $state) { ?>
                                <option value="<?php echo $state['id']; ?>" <?php if ($state['id'] == $lang) { ?> selected="selected" <?php } ?>><?php echo $state['language']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="search-bar right-align-box">    
            <div class="language-filter clearfix">
                <div class="select-container">
                    <div class="select-arrow">
                        <div class="arrow-down"></div>
                    </div>    
                    <form id="sort_catagory" action="<?php echo $this->config->base_url() ?>index.php/magazinearticlelist?rowId=<?php echo $magazine_id;?>" method="POST">
                        <select class="choose-lang" onChange="CatagoryData(this.value,'<?php echo $_GET['catagory'] ?>','<?php echo $_GET['lang'] ?>','<?php echo $_GET['rowId'] ?>');" name="catagory" id="catagory">
                            <option value="" name="">Select Status</option>
                            <option value="1" <?php if ($catagory == 1) { ?> selected="selected" <?php } ?> name="pending">Pending</option>
                            <option value="3" <?php if ($catagory == 3) { ?> selected="selected" <?php } ?> name="rejected">Rejected</option>
                           
                        </select>
                    </form>
                </div>
            </div>
        </div>


    </div>-->

    <div class="category-list">
        <div class="table-container">
            <?php
                    if ($data_result != "") {?>
            <script class="jsbin" src="https://datatables.net/download/build/jquery.dataTables.nightly.js"></script>
        <script>
    $(document).ready(function () {
        $('#custPubArticle').dataTable({"bPaginate": false,"bSort": false});
    });
        </script>
            <table id="custPubArticle" border="0" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <!--th><input type="checkbox" /></th-->
                    <th><?php echo $this->lang->line('Title') ?></th>
                    <th><?php echo $this->lang->line('Author') ?></th>                    
                    <th><?php echo $this->lang->line('Magazine') ?></th>
                    <th><?php echo $this->lang->line('Tags') ?></th>                    
                    <th><span class="commentNotification"><?php echo $this->lang->line('No_of_comments') ?></span></th>
<!--                    <th><?php echo $this->lang->line('Language') ?></th>
                    <th><?php echo $this->lang->line('Article_Language') ?></th>-->
                    <th><?php echo $this->lang->line('Status') ?></th>                    
                    <th><?php echo $this->lang->line('Action') ?></th>
                </tr>
                </thead>
                <tbody>
                <div style="color: red"><p><?php echo $msg;  echo $this->session->flashdata("msg");?>   </p>
                    <div style="color: green" ><?php echo $this->session->flashdata("susmsg");?>   </div>
                    <?php echo validation_errors(); ?></div>
                <?php //echo"<pre>"; print_r($data_result); die; ?>
                <tr> <?php
                    
                        foreach ($data_result as $value) { ?> 
                            
                            <td><?php echo$value['title']; ?></td>
                            <td><?php
       if ($value['created_by'] == '1') {
            echo "Admin";
        }if ($value['created_by'] == '2') {
            echo "Customer";
        }if ($value['created_by'] == '3') {
            echo "User";
        } else {
            if($value['website_url']!=''){
            $explode=  explode(".", $value['website_url']);
            }else{
            $explode=  explode(".", $value['article_link']);
            }
            echo $explode[1];
        }
        ?></td>                            
                            <td><?php
                                $name = array();
                                foreach ($value['categoy_name'] as $cn) {
                                    $name[] = $cn['category_name'];
                                }
                                echo implode(',', $name);
                                ?></td>
                            <td><?php echo$value['tags']; ?></td>
                            <td><span class="commentNotification"><em><?php echo$value['comment_count']; ?></em></span></td>
                            <td><?php echo$value['language']; ?></td>
                            <td><?php if($value['article_language']=='1'){ echo"English"; }
                            elseif($value['article_language']=='2'){ echo"Portuguese"; }
                            elseif($value['article_language']=='3'){ echo"Spanish"; } ?>  
                            </td>
                            
                         <td>
                             <?php if ($value['status'] == '1') {  ?>
                         <spam class="pending-btn"><?php echo $this->lang->line('Pending') ?></spam>
                        <?php } else if($value['status'] == '3') { //as new added by customer?>
                            <spam class="rejected-btn"><?php echo $this->lang->line('Rejected') ?></spam>
                        <?php } ?></a>
                         </td>
                        
                        <td>
                            <?php
                            if ($value['created_by'] == '1') {
                                echo "Admin Article";
                            }else{
                            if ($value['status'] == '3') { ?>
                            <a id="rejection-report" class="view-bttn" href="javascript:void(0)" onclick="getRejactionDetails('<?php echo $value['id']; ?>');">Rejection Report</a>
                            <a class="delete-bttn" onclick="return confirm('<?php echo $this->lang->line('Are_you_sure_want_to_delete_this_record')?>')" href="<?php echo $this->config->base_url(); ?>index.php/deletemagzineads?val=<?php echo $value['id']; ?>&source=<?php echo $value['source'] ?>&rowId=<?php echo $_GET['rowId'] ?>">delete</a>
                            <a class="edit-icon" href="<?php echo $this->config->base_url(); ?>index.php/editcustomerarticle?rowId=<?php echo $value['id']; ?>&mag=<?php echo $_REQUEST['rowId']; ?>&source=<?php echo $value['source'];?>">Edit</a>
                               
                           <?php }elseif($value['status'] == '1'){ ?>
                            <a class="delete-bttn" onclick="return confirm('<?php echo $this->lang->line('Are_you_sure_want_to_delete_this_record')?>')" href="<?php echo $this->config->base_url(); ?>index.php/deletemagzineads?val=<?php echo $value['id']; ?>&source=<?php echo $value['source'] ?>&rowId=<?php echo $_GET['rowId'] ?>">delete</a>
                            <a class="edit-icon" href="<?php echo $this->config->base_url(); ?>index.php/editcustomerarticle?rowId=<?php echo $value['id']; ?>&mag=<?php echo $_REQUEST['rowId']; ?>&source=<?php echo $value['source'];?>">Edit</a>                                                
                            <?php }} ?>
                        </td></tr>
                        <?php  }  ?>
            </tbody>
     
            </table>
                    <?php } ?>

        </div>

    </div>


    <div class="pagination clearfix">
        <ul><?php echo $this->pagination->create_links(); ?></ul> 
    </div>
    <!--Pop up-->


<div class="layer-bg">
    <div class="popup-container info-popup clearfix">
        <div class="close-bttn"></div>
        <div class ="displayData1 popUpDiv"> 
        </div>
    </div>
</div>

</div>  

</div>