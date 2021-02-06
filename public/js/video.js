jQuery(document).ready(function($){

console.log(123);
    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });

    // CREATE
    $(".btn-show").click(function (e) {

        var chapter_id = $(this).data('chapter_id');
        var lesson_id = $(this).data('lesson_id');
        console.log(chapter_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            chapter_id: chapter_id,
            lesson_id: lesson_id,
        };
        var ajaxurl = '/video';
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: formData,
            success: function (data) {

                if (data.length === 0)
                {
                    $('#ajax_data').html('<input data-chapter_id="' + chapter_id + '" type="submit" name="chapter_id" value="Neues Video hochladen">')
                } else {
                    $('#ajax_data').html(data)
                }

            },
            error: function (data) {
            }
        });
    });


    $("#manage_content").click(function (e) {

        var chapter_id = $(this).data('chapter_id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            chapter_id: chapter_id,
        };
        var ajaxurl = '/chapter/manage';
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: formData,
            success: function (data) {

                if (data.length === 0)
                {
                    $('#ajax_data').html('<input data-chapter_id="' + chapter_id + '" type="submit" name="chapter_id" value="Neues Video hochladen">')
                } else {
                    $('#ajax_data').html(data)
                }

            },
            error: function (data) {
                console.log(data);
            }
        });
    });

});