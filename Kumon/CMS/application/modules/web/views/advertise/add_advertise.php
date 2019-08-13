<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<!--script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js" type="text/javascript"></script-->
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>/jss/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>/jss/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>/jss/evol.colorpicker.min.js"></script>


<!-- Load jQuery and the validate plugin -->
<script src="<?php echo base_url() ?>js/jquery.validate.min.js"></script>
<!-- Define some CSS -->
<style type="text/css">
    .label {
        width: 100px;
        text-align: right;
        float: left;
        padding-right: 10px;
        font-weight: bold;
    }

    add_subadmin.error, .output {
        color: #FFFFFF;
        font-weight: bold;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $(".uploadFile").change(function () {
            var filePath = $(this).val();
            if (filePath.substring(0, 2) === "C:") {
                filePath = filePath.slice(12);
            }
            $(this).parent().parent().find("span").html(filePath).addClass('fileName');
        });
    })
</script>

<script>
    $(document).ready(function () {
        $(".add-new").click(function () {
            $(".layer-bg").fadeIn();
        });

        $(".close-bttn, .layer-bg-popupOverlay").click(function () {
            $(".layer-bg").fadeOut();
        });
        $('.layout-type li').click(function () {
            $('.layout-type li').removeClass("active");
            $(this).addClass("active");
        });

        $(".banner-note").hide(); //Hide all content
        $(".layout-type li:first").addClass("selected").show(); //Activate first tab
        $(".banner-note:first").show(); //Show first tab content
        //On Click Event
        $(".layout-type li").click(function () {
            $(".layout-type li").removeClass("selected"); //Remove any "active" class
            $(this).addClass("selected"); //Add "active" class to selected tab
            $(".banner-note").hide(); //Hide all tab content
            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active content
            return false;
        });

    });
</script>


<div class="subheader">
    <div class="fix-container clearfix">
        <h4><?php echo $this->lang->line('Create_Advertisement') ?></h4>
    </div>
</div>
<?php
$attributes = array('name' => 'add_advertise', 'id' => 'add_advertise', 'class' => 'form-horizontal');
echo form_open_multipart($this->config->base_url() . 'index.php/addadvertise', $attributes);
?>
<div class="fix-container clearfix">

    <div class="addvertisement-container clearfix">
        <div style="color: red"><p><?php echo $msg;
                echo $this->session->flashdata("msg");
                ?>   </p>
            <?php echo validation_errors(); ?></div>
        <h3><?php echo $this->lang->line('Choose_Layout') ?></h3>

        <div class="layout-type">
            <ul>
                <li class="layout_li" id="1"><a href="#layout-1"><img
                                src="<?php echo $this->config->base_url(); ?>images/layout-type-1.png" alt=""
                                name="layout" value="1"/>
                        <?php echo $this->lang->line('Layout_1') ?></a>
                </li>
                <li class="layout_li" id="2"><a href="#layout-2"><img
                                src="<?php echo $this->config->base_url(); ?>images/layout-type-2.png" alt=""
                                name="layout" value="2"/>
                        <?php echo $this->lang->line('Layout_2') ?></a>
                </li>
                <li class="layout_li" id="3"><a href="#layout-3"><img
                                src="<?php echo $this->config->base_url(); ?>images/layout-type-4.png" alt=""
                                name="layout" value="3"/>
                        <?php echo $this->lang->line('Layout_3') ?></a>
                </li>
                <li class="layout_li" id="4"><a href="#layout-4"><img
                                src="<?php echo $this->config->base_url(); ?>images/layout-type-3.png" alt=""
                                name="layout" value="4"/>
                        <?php echo $this->lang->line('Layout_4') ?></a>
                </li>
            </ul>
            <label class="layout_error error_msg" style="display:none;"></label>

        </div>


        <h3><?php echo $this->lang->line('Advertisement_Format') ?></h3>
        <div class="advertisement-type clearfix">
            <div class="checkbox-container">
                <input type="checkbox" name="media_type" class="check_media" id="media_type_s" value="1" checked="true">
                Standard
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="media_type" class="check_media" id="media_type_v" value="2"> video
            </div>
            <div class="clearfix"></div>
            <label class="advertisement_error error_msg" style="display:none;"></label>
        </div>

        <div class="advertisement-type clearfix" id="embed_div" style="display:none;">
            <div class="left-cols">
                <label><?php echo $this->lang->line('embed_video') ?> :</label>
                <input id='embed' type='text' name='embed' id="embed" value=''>
                <label class="embed_error" style="display:none;color: red;">Please insert video url</label>
            </div>
        </div>

        <!--        <div class="advertisement-type clearfix" id="embed_thumb" style="display:none;">
            <div class="left-cols">
                      <label><?php echo $this->lang->line('embed_video_thumb') ?> :</label>
                      <input  type='file' name='thumb_embeded' id="thumb_embeded" value=''>
                      <label class="embed_thumb_error" style="display:none;color: red;">Please insert video url</label>
            </div>
        </div>-->


        <!--        <div class="input-box" style='display:none;' id='video_div_thumb'>
                        <label><?php echo $this->lang->line("Upload_thumb_embeded"); ?>:</label>
                        <div class="add-photo"><em><input type="file" name="thumb_embeded" id="thumb_embeded" /></em>
                            <img src="<?php echo base_url() . $article_data['embed_video_thumb']; ?>" />
                            <div id="preview1Embed" style="display:none;"class="imgPlaceholder imgPlaceholderBottom">
                                <img id="previewimg1Embed" src=""/>                        
                            </div>
                        </div>                    
        </div>-->

        <div class="add-article-form" id="embed_thumb" style="display:none;">
            <div class="input-box" id="video_div_thumb">
                <label><?php echo $this->lang->line("Upload_thumb_embeded"); ?>:</label>
                <div class="add-photo"><em><input type="file" name="thumb_embeded" id="thumb_embeded"></em>
                    <div id="preview1Embed" style="display:none;" class="imgPlaceholder imgPlaceholderBottom">
                        <img id="previewimg1Embed" src="">
                    </div>
                </div>
            </div>

        </div>


        <div class="advertisement-type clearfix">
            <div class="addvertisement-sizes">
                <label><?php echo $this->lang->line('Banner') ?></label>
                <div class="drop-banner"><span><?php echo $this->lang->line('Upload_Banner') ?></span>
                    <div class="file-container">
                        <input class="uploadFile" type="file" name="cover_pic" id="cover_pic">
                    </div>
                </div>

                <div class="drop-banner"><span><?php echo $this->lang->line('Upload_Banner_Poetrait') ?></span>
                    <div class="file-container">
                        <input class="uploadFile" type="file" name="cover_pic1" id="cover_pic1">
                    </div>
                </div>

                <div class="drop-banner"><span><?php echo $this->lang->line('Upload_Banner_landscape') ?></span>
                    <div class="file-container">
                        <input class="uploadFile" type="file" name="cover_pic2" id="cover_pic2">
                    </div>
                </div>
                <label class="banner_error error_msg" style="display:none;"></label>
            </div>

            <div class="banner-note" id="layout-1">
                <label><?php echo $this->lang->line('Note') ?></label>
                <span>Banner Image Size: 290px * 190px </span>
                <span>Banner Image dimension(portrait) : 505px * 505px</span>
                <span>Banner Image dimension(Landscape) : 599px * 445px</span>

            </div>
            <div class="banner-note" id="layout-2">
                <label><?php echo $this->lang->line('Note') ?></label>
                <span>Banner Image Size: 580*570 </span>
                <span>Banner Image dimension(portrait) : 1519px * 892 px</span>
                <span>Banner Image dimension(Landscape): 1012px * 1280px </span>

            </div>
            <div class="banner-note" id="layout-3">
                <label><?php echo $this->lang->line('Note') ?></label>
                <span>Banner Image Size: 580*380 </span>
                <span>Banner Image dimension(portrait) : 880px * 894px</span>
                <span>Banner Image dimension(Landscape): 1022px * 1036px</span>

            </div>
            <div class="banner-note" id="layout-4">
                <span>Banner Image Size: 580 * 190 </span>
                <span>Banner Image dimension(portrait):880px * 444px </span>
                <span>Banner Image dimension(Landscape):  1022px * 516px</span>

            </div>

            <div class="left-cols">


                <!--<label><?php echo $this->lang->line('Language_new') ?></label>
                <div class="select-container">
                    <div class="select-arrow">
                        <div class="arrow-down"></div>
                    </div>    
                    <select class="choose-lang" name ='language' id="languageval" onchange="removeall()">                    
                    <?php
                foreach ($language_result as $state) {
                    echo '<option value="' . $state['id'] . '">' . $state['language'] . '</option>';
                }
                ?>
                    </select>
                   
                </div>
                 <label class="language_error error_msg" style="display:none;"></label>
                -->


            </div>
        </div>

        <script language="JavaScript">
            function togglecat(source) {
                checkboxes = document.getElementsByName('catagory[]');
                for (var i = 0, n = checkboxes.length; i < n; i++) {
                    checkboxes[i].checked = source.checked;
                }
            }

            function toggle(source) {
                checkboxes = document.getElementsByName('magazine[]');
                for (var i = 0, n = checkboxes.length; i < n; i++) {
                    checkboxes[i].checked = source.checked;
                }
            }

            /* for uncheck check box select all option */
            function removeall() { //alert('hello');
                document.getElementById("selectall").checked = false;
            }
        </script>


        <div class="advertisement-type clearfix">


            <div class="left-cols">
                <label><?php echo $this->lang->line('Links') ?></label>
                <input type="text" placeholder="Enter your Link" name="link" id="link">
                <label class="error_url error_msg"></label>
                <label><?php echo $this->lang->line('Magazine') ?></label>
                <div class="selectAll">
                    <input type="checkbox" name='selectall' id='selectall' onClick="toggle(this)"/> Select All

                </div>

                <div class="multiselect-box clearfix selectCategory">
                    <!--input type="checkbox" onClick="toggle(this)" /> Toggle All<br/-->
                    <?php
                    foreach ($data_result as $value) {
                        //$catagory_id = $value['id'];
                        //$catagory_name = $value['category_name'];
                        $magazine_id = $value['id'];
                        $magazine_name = $value['title'];
                        echo '<div class="cbox"><input type="checkbox" name="magazine[]" class="catagory_class" value="' . $magazine_id . '" />' . $magazine_name . '</div>';
                    }
                    ?>

                </div>
                <label class="category_error error_msg" style="display:none;"></label>

            </div>

            <div class="left-cols">

                <div class="input-box">
                    <label><?php echo $this->lang->line('Article_Language') ?></label>
                    <select class="" name='articlelang' id="articlelang">
                        <?php
                        foreach ($language_result as $state) {
                            echo '<option value="' . $state['id'] . '">' . $state['language'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>


        </div>

        <div class="advertisement-type clearfix">
            <a class="review" href="#" onclick="return checkFormValidation()">Publish</a>
            <input type="hidden" name="layout_value" id="layout_value">
            <input type="submit" value="Save" name="save" id="save" onclick="return checkFormValidation()"/>
        </div>
        <?php //echo form_close(); ?>


    </div>
    <script src="<?php echo base_url() ?>js/jquery.validate.js"></script>


    <script>
        $('#languageval').change(function () {
            if ($(this).val() != '') {
                $.ajax({
                    url: "<?php echo base_url()?>index.php/getCategoryFromLanguage",
                    type: "POST",
                    data: {'id': $(this).val()},
                    success: function (res) {
                        $('.selectCategory').html(res);
                    }
                });
            } else {
                $('.selectCategory').html('');
            }
        });
    </script>
</div>


<!--Pop up-->


<div class="layer-bg">
    <div class="layer-bg-popupOverlay"></div>
    <div class="popup-container clearfix">
        <div class="close-bttn"></div>
        <h4><?php echo $this->lang->line('Advertisement_Publish') ?></h4>

        <div class="popup-inner clearfix">
            <div><?php echo validation_errors(); ?>
            </div>


            <!--            <script>
                $(function() {
                    $("#datefrom").datepicker({yearRange: "1900:3000", dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, minDate: 'today', inline: true});
                });
                        </script>-->
            <div class="input-box clearfix"><label><?php echo $this->lang->line('Publish_Date_From') ?></label>
                <input type="text" id="dt1" placeholder="enter date" name="datefrom">
                <label class="date_form_error error_msg">

                </label>
            </div>
            <!--            <script>
                            $(function() {
                                $("#dateto").datepicker({yearRange: "1900:3000", dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, minDate: 'today', inline: true});
                            });
                        </script>-->
            <script>
                $(document).ready(function () {

                    $("#dt1").datepicker({
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                        onSelect: function (date) {
                            var date2 = $('#dt1').datepicker('getDate');
                            date2.setDate(date2.getDate() + 1);
                            $('#dt2').datepicker('setDate', date2);
                            //sets minDate to dt1 date + 1
                            $('#dt2').datepicker('option', 'minDate', date2);
                        }
                    });
                    $('#dt2').datepicker({
                        dateFormat: "yy-mm-dd",
                        onClose: function () {
                            var dt1 = $('#dt1').datepicker('getDate');
                            var dt2 = $('#dt2').datepicker('getDate');
                            //check to prevent a user from entering a date below date of dt1
                            if (dt2 <= dt1) {
                                var minDate = $('#dt2').datepicker('option', 'minDate');
                                $('#dt2').datepicker('setDate', minDate);
                            }
                        }
                    });
                });
            </script>

            <div class="input-box clearfix"><label>
                    <?php echo $this->lang->line('Publish_Date_To') ?></label>
                <input type="text" id="dt2" placeholder="enter date" name="dateto">
                <label class="date_to_error error_msg">

                </label>
            </div>

            <div class="input-box clearfix"><label><?php echo $this->lang->line('Display_time') ?></label>
                <input type="text" id="time" placeholder="enter time" name="time" onkeyup="getLimited(this.value)">
                <label class="time_error error_msg">

                </label>
            </div>
            <input type="hidden" name="advertise_id" id="advertise_id" value="">


            <div class="input-box clearfix">
                <input type="submit" value="Publish" name="save" id="save"
                       onclick="return checkPublishFormValidation()"/>
            </div>
        </div>
    </div>
</div>
</form>
<?php // echo form_close(); ?>


<script>
    $('.layout_li').click(function () {
        $('#layout_value').val($(this).attr('id'));
    });
    $('#media_type_v').click(function () {
        $('#embed_div').show();
        $('#embed_thumb').show();
    });
    $('#media_type_s').click(function () {
        $('#embed_div').hide();
        $('#embed_thumb').hide();
    });

    /*CHECK BOX CHECKED OR UNCHECKED*/
    $("[id*='type']").click(
        function () {
            var isCheckboxChecked = this.checked;
            $("[id*='type']").attr('checked', false);
            this.checked = isCheckboxChecked;
        });

    /* 5% SECOND VALIDATION*/
    var set;

    function getLimited(input) {
        if (input.length == 1) {
            if (input != '') {
                if (input < 5) {
                    set = 5;
                } else {
                    set = input;
                }
            }
            else {
                set = '';
            }
        } else {
            set = input;
        }
        //$('#setTime').val(set);
    }

    $('#time').blur(function () {
        if ($('#time').length == 1) {
            $('#time').val(set);
        }
    });

</script>

<script>
    $(document).ready(function () {
        $(".review").click(function () {

            if ($i == 0) {
                $(".layer-bg").fadeIn();
            } else {
                alert('<?php echo $this->lang->line('please_validate_form');?>');
            }
        });

        $(".close-bttn, .layer-bg-popupOverlay").click(function () {
            $(".layer-bg").fadeOut();
        });
    });


    function checkFormValidation() {//alert('chek');//return false;
        $i = 0;
        $j = 0;
        var che = $('#languageval option:selected').val();
        //alert(che);return false;
        if ($('#layout_value').val() == '') {
            $i++;
            $('.layout_error').show();
            $('.layout_error').html("<?php echo $this->lang->line('valid_select_layout');?>");
            //return false;
        }
        else {
            $('.layout_error').hide();
        }
        if ($('#languageval option:selected').val() == '') {
            $i++;//alert('yes');
            $('.language_error').show();
            $('.language_error').html("<?php echo $this->lang->line('valid_select_language');?>");
            //return false;
        }
        else {
            $('.language_error').hide();
        }
        if ($('#media_type_s:checked').length > 0) {
            if (($('#cover_pic').val() == '') || ($('#cover_pic1').val() == '') || ($('#cover_pic2').val() == '')) {
                $i++;
                $('.banner_error').show();
                $('.banner_error').html("<?php echo $this->lang->line('valid_select_banner_image');?>");
            }
            else {

                $('.banner_error').hide();
            }
        } else if ($('#media_type_v:checked').length > 0) {

            if (($('#embed').val() == '') && $('#thumb_embeded').val() == '' && ($('#cover_pic').val() == '')) {
                $i++;
                $('.embed_error').show();
                $('.banner_error').hide();
            } else {
                $('.embed_error').hide();
            }
        }


        if ($('.check_media:checked').length == 0) {
            $i++;
            $('.advertisement_error').show();
            $('.advertisement_error').html("<?php echo $this->lang->line('select_adv_format');?>");
        } else {

            $('.advertisement_error').hide();
        }

        if ($('.catagory_class_true:checked').length == 0 && $('.catagory_class:checked').length == 0) {
            $i++;
            $('.category_class_error').show();
            //$('.category_class_error').html("<?php echo $this->lang->line('valid_select_category');?>");
        } else {
            $('.category_class_error').hide();
        }

        checkIsUrl();
        if ($i > 0) {
            return false;
        }


        return true;
    }

    function checkPublishFormValidation() {
        $k = 0;
        // alert('hey');return false;
        if ($('#dt1').val() == '') {
            $k++;//console.log('valid');
            $('.date_form_error').show();
            $('.date_form_error').html("<?php echo $this->lang->line('valid_select_date_form');?>");
        } else {
            $('.date_form_error').hide();
        }
        if ($('#dt2').val() == '') {
            $k++;
            $('.date_to_error').show();
            $('.date_to_error').html("<?php echo $this->lang->line('valid_select_date_to');?>");
        } else {
            $('.date_to_error').hide();
        }
        if ($('#time').val() == '') {
            $k++;
            $('.time_error').show();
            $('.time_error').html("<?php echo $this->lang->line('valid_select_display_time');?>");
        } else {
            $('.time_error').hide();
        }
        //alert($k);
        return checkFormValidation();
        if ($k > 0) {
            return false;
        }

        return true;

    }

    function checkIsUrl() {
        var url_validate;
        var url = $('#link').val();
        url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        if (url != '') {
            if (!url_validate.test(url)) {
                $i++;
                $('.error_url').show();
                $('.error_url').html("<?php echo $this->lang->line('valid_input_valid_url');?>");
                //return false;
            } else {
                $('.error_url').hide();
            }
            return true;

        }
    }


    //thumbnail
    $("#thumb_embeded").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded1Embed;
            reader.readAsDataURL(this.files[0]);
        }
    })


    function imageIsLoaded1Embed(e) {
        $('#message').css("display", "none");
        $('#preview1Embed').css("display", "block");
        $('#previewimg1Embed').attr('src', e.target.result);
    }
</script>
<style>
    .advertisement-type label.error_msg, .layout-type label.error_msg, .input-box label.error_msg {
        color: #f00;
        font-size: 12px;
        margin: 8px 0 0;
    }

    .input-box label.error_msg {
        text-align: right;
        display: block;
        width: auto;
        float: right;
        margin: 5px 14px 0 0;
    }
</style>
</body>
</html>
