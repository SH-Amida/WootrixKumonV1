<!doctype html>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<!--script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js" type="text/javascript"></script-->
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>/jss/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>/jss/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>/jss/evol.colorpicker.min.js"></script>

<script src="<?php echo $this->config->base_url() . 'js/ckeditor/ckeditor.js'; ?>"></script>

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

<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('catagory[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function toggleMag(source) {
        checkboxes = document.getElementsByName('magazine[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function toggleGroup(source) {
        checkboxes = document.getElementsByName('group[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function toggleLocation(source) {
        checkboxes = document.getElementsByName('location[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function toggleDiscipline(source) {
        checkboxes = document.getElementsByName('discipline[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function toggleBranch(source) {
        checkboxes = document.getElementsByName('branch[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    /* for uncheck check box select all option */
    function removeall() {
        alert('hello');
        document.getElementById("selectall").checked = false;
    }
</script>

<body>
<div class="fix-container clearfix">
    <div class="add-article">
        <?php
        $attributes = array('name' => 'add_article', 'id' => 'add_article', 'class' => 'form-horizontal');
        echo form_open_multipart($this->config->base_url() . 'index.php/addarticle', $attributes);
        ?>

        <div style="color: red"><p><?php echo $msg;
                echo $this->session->flashdata("msg");
                ?><?php echo validation_errors(); ?></p>
        </div>

        <div class="add-article-form show_form">

            <div class="left-grid">

                <div class="input-box">
                    <label><?php echo $this->lang->line("Title"); ?>:</label>
                    <input id="title" type="text" name="title" value="">
                </div>

                <div class="input-box">
                    <label><?php echo $this->lang->line("Upload_Image"); ?>:</label>
                    <div class="add-photo"><em><input type="file" name="cover_pic" id="cover_pic"/></em>
                        <div id="preview1" style="display:none;" class="imgPlaceholder imgPlaceholderBottom">
                            <img id="previewimg1" src=""/>
                        </div>
                    </div>
                </div>

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

                <div class="input-box">
                    <label class="full-width-label"><?php echo $this->lang->line('magazines_list') ?></label>
                    <div class="selectAll">
                        <input type="checkbox" name='selectall' id='selectall' onClick="toggleMag(this)"/> Select All
                    </div>
                    <div class="multiselect-box selectCategory">
                        <?php

                        if (!empty($customer_magazine)) {
                            foreach ($customer_magazine as $value) {
                                $id = $value['id'];
                                $magazine_name = $value['title'];
                                echo '<div class="cbox"><input type="checkbox"  class="catagory_class" id="magazine[]" name="magazine[]" value="' . $id . '" />' . $magazine_name . '</div>';
                            }
                        }
                        ?>
                    </div>
                    <label for="catagory" style="display:none;" generated="true"
                           class="error category_class_error"><?php echo $this->lang->line("Please_select_magazine") ?>
                        .</label>
                </div>

            </div>

            <div class="right-grid">

                <div class="input-box">

                    <label class="full-width-label">Tipo de usuário</label>

                    <div class="selectAll">
                        <input type="checkbox" name='selectall' id='selectall' onClick="toggleGroup(this)"/> Select All
                    </div>

                    <div class="multiselect-box clearfix fullbox selectCategory">
                        <?php
                        if (!empty($groups)) {
                            foreach ($groups as $value) {
                                $id = $value['id'];
                                $magazine_name = $value['name'];
                                echo '<div class="cbox"><input type="checkbox"  class="catagory_class" id="group[]" name="group[]" value="' . $id . '" />' . $magazine_name . '</div>';
                            }
                        }
                        ?>
                    </div>

                    <label for="catagory" style="display:none;" generated="true" class="error category_class_error"><?php echo $this->lang->line("Please_select_magazine") ?>.</label>

                </div>

                <div class="input-box">

                    <label class="full-width-label">Localidade</label>

                    <div class="selectAll">
                        <input type="checkbox" name='selectall' id='selectall' onClick="toggleLocation(this)"/> Select All
                    </div>

                    <div class="multiselect-box clearfix fullbox selectCategory">
                        <?php
                        if (!empty($locations)) {
                            foreach ($locations as $value) {
                                $id = $value['id'];
                                $magazine_name = $value['city'];
                                echo '<div class="cbox"><input type="checkbox"  class="catagory_class" id="location[]" name="location[]" value="' . $id . '" />' . $magazine_name . '</div>';
                            }
                        }
                        ?>
                    </div>

                    <label for="location" style="display:none;" generated="true" class="error category_class_error">Por favor, selecione uma localidade.</label>

                </div>

                <div class="input-box">

                    <label class="full-width-label">Matéria</label>

                    <div class="selectAll">
                        <input type="checkbox" name='selectall' id='selectall' onClick="toggleDiscipline(this)"/> Select All
                    </div>

                    <div class="multiselect-box clearfix fullbox selectCategory">
                        <?php
                        if (!empty($disciplines)) {
                            foreach ($disciplines as $value) {
                                $id = $value['id'];
                                $magazine_name = $value['name'];
                                echo '<div class="cbox"><input type="checkbox"  class="catagory_class" id="discipline[]" name="discipline[]" value="' . $id . '" />' . $magazine_name . '</div>';
                            }
                        }
                        ?>
                    </div>

                    <label for="catagory" style="display:none;" generated="true" class="error category_class_error">Por favor, selecione uma matéria.</label>

                </div>

                <div class="input-box">

                    <label class="full-width-label">Filial</label>

                    <div class="selectAll">
                        <input type="checkbox" name='selectall' id='selectall' onClick="toggleBranch(this)"/> Select All
                    </div>

                    <div class="multiselect-box clearfix fullbox selectCategory">
                        <?php
                        if (!empty($branches)) {
                            foreach ($branches as $value) {
                                $id = $value['branch'];
                                $magazine_name = $value['branch'];
                                echo '<div class="cbox"><input type="checkbox"  class="catagory_class" id="branch[]" name="branch[]" value="' . $id . '" />' . $magazine_name . '</div>';
                            }
                        }
                        ?>
                    </div>

                    <label for="catagory" style="display:none;" generated="true" class="error category_class_error">Por favor, selecione uma matéria.</label>

                </div>

            </div>

            <h3>Format<?php //echo $this->lang->line('Advertisement_Format')  ?></h3>
            <div class="advertisement-type clearfix">
                <div class="checkbox-container"><input type="checkbox" name="media_type" id="media_type_s" value="0"
                                                       checked='checked'> <?php echo $this->lang->line("Standard"); ?>
                </div>
                <div class="checkbox-container"><input type="checkbox" name="media_type" id="media_type_v"
                                                       value="1"> <?php echo $this->lang->line("video"); ?> </div>
                <br>
                <label for="catagory" style="display: none; color:red" generated="true" class="error format_error">
                    Please select at least one format .
                </label>
            </div>

            <?php
            if ($_GET['request'] == '1') {
                ?>
                <div class="input-box clearfix">
                    <label>URL :</label>
                    <input type="text" name="url" id="url" class="input-url">
                    <label class="url_error error" style="display:none;">
                        Please enter url </label>
                </div>
                <?php
            }
            if ($_GET['request'] != '1') {
                ?>

                <div class='input-box clearfix' id="embed_div" style="display:none;">
                    <label><?php echo $this->lang->line('embed_video') ?> :</label>
                    <input id='embed' type='text' name='embed' id="embed" value=''>
                </div>

                <div class="add-article-form">
                    <div class="input-box" style='display:none;' id='video_div_thumb'>
                        <label><?php echo $this->lang->line("Upload_thumb_embeded"); ?>:</label>
                        <div class="add-photo"><em><input type="file" name="thumb_embeded" id="thumb_embeded"/></em>
                            <div id="preview1Embed" style="display:none;" class="imgPlaceholder imgPlaceholderBottom">
                                <img id="previewimg1Embed" src=""/>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <div class="input-box" style='display:none;' id='video_div'>
                <label><?php echo $this->lang->line("Upload_video"); ?>:</label>
                <div class="add-video"><em></em><input type="file" name="video" id="video"/></div>
            </div>

            <label id="video_error" style="display:none; color: red;">Upload or embed video</label>


            <div class="input-box clearfix">
                <label><?php echo $this->lang->line('Tags') ?> :</label>
                <input id="title" type="text" name="tags" value="">
            </div>

            <div class="input-box">
                <label><?php echo $this->lang->line('Publish_Date_From') ?></label>
                <input type="text" id="dt1" placeholder="enter date" name="datefrom" readonly="true"></div>

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

            <div class="input-box"><label><?php echo $this->lang->line('Publish_Date_To') ?></label>
                <input type="text" id="dt2" placeholder="enter date" name="dateto" readonly="true"></div>


            <div class="input-box" id="content_h">
                <textarea id="html_content" rows="5" cols="5" name="description"> </textarea>
            </div>

            <div class="input-box">
                <div class="input-container clearfix">
                    <input type="submit" value="Save in Draft" name="save"/>
                    <input type="submit" value="Publish" name="publish"/>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            var editor = CKEDITOR.replace('html_content');
            CKFinder.setupCKEditor(editor, '/ckfinder/');
        </script>


        <?php echo form_close(); ?>


        <script>

            // When the browser is ready...
            $(function () {

                // Setup form validation on the #register-form element
                $("#add_article").validate({
                    // Specify the validation rules
                    rules: {
                        title: "required",
                        magazine: "magazine",
                        language: "required",
                        datefrom: {
                            required: true
                        },
                        dateto: {
                            required: true
                        }
                    },
                    // Specify the validation error messages
                    messages: {
                        title: "<?php echo $this->lang->line("Please_enter_your_title") ?>",
                        magazine: "<?php echo $this->lang->line("Please_select_magazine") ?>",
                        datefrom: "<?php echo $this->lang->line("Please_select_date_from") ?>",
                        dateto: "<?php echo $this->lang->line("Please_select_date_to") ?>",
                    },
                    submitHandler: function (form) {
                        if ($(".catagory_class:checked").length == 0) {
                            $('.category_class_error').show();
                            return false;
                        }
                        if ($("#media_type_s:checked").length == 0 && $("#media_type_v:checked").length == 0) {
                            $('.format_error').show();
                            return false;
                        }

                        if ($('#media_type_v:checked').length > 0) {
                            <?php
                            if($_GET['request'] != '1'){
                            ?>
                            var embed = $("#embed").val();
                            var embed_thumb = $("#thumb_embeded").val();
                            var video = $("#video").val();
                            if (embed == '' && embed_thumb == '' && video == '') {
                                $('#video_error').show();
                                return false;
                            }
                            if (video == '' && embed == '') {
                                $('#video_error').show();
                                return false;
                            }
                            if (embed != '' && embed_thumb == '') {
                                $('#video_error').show();
                                return false;
                            }
                            <?php }?>
                        }

                        <?php if(isset($_GET['request'])){?>
                        if ($('#url').val() == '') {
                            $('.url_error').show();
                            return false;
                        }
                        <?php }?>
                        form.submit();
                    }
                });

            });

        </script>


        <script>
            $(document).ready(function () {
                $('#media_type_v').click(function () {
                    $('#media_type_s').removeAttr('checked');
                    $('#video_div').show();
                    $('#video_div_thumb').show();
                    $('#embed_div').show();

                });
                $('#media_type_s').click(function () {
                    $('#media_type_v').removeAttr('checked');
                    $('#media_type_s').attr('checked', 'checked');
                    $('#video_div_thumb').hide();
                    //$('#content_h').show();
                    $('#video_div').hide();
                    $('#embed_div').hide();

                });
            });

        </script>


    </div>

</div>
<script>
    $('#languageval').change(function () {
        if ($(this).val() != '') {
            $.ajax({
                url: "<?php echo base_url() ?>index.php/getCategoryFromLanguage",
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


    $("#cover_pic").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded1;
            reader.readAsDataURL(this.files[0]);
        }
    })


    function imageIsLoaded1(e) {
        $('#message').css("display", "none");
        $('#preview1').css("display", "block");
        $('#previewimg1').attr('src', e.target.result);
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


    // Function for Deleting Preview Image.
    $("#deleteimg1").click(function () {
        $('#preview1').css("display", "none");
        $('#cover_pic').val("");
    });
</script>


</body>
</html>
