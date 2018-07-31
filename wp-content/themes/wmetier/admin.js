jQuery(function($){
    /*
     * действие при нажатии на кнопку загрузки изображения
     * вы также можете привязать это действие к клику по самому изображению
     */


    $('#add_upload_field').on('click',function(){
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            console.log(attachment);
            button.next('.for-title-name').html(attachment.title);
            $('.upload-container').append('<div class="wraper-item-upload"><span class="name-file">' + attachment.title + '</span><button type="submit" class="remove_image_button button">&times;</button><input type="hidden" name="upload_file[]" value="'+attachment.id+'"></div>');
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });

    $('#add_upload_field_user').on('click',function(){
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            console.log(attachment);
            button.next('.for-title-name').html(attachment.title);
            $('.upload-container-user').append('<div class="wraper-item-upload"><span class="name-file">' + attachment.title + '</span><button type="submit" class="remove_image_button button">&times;</button><input type="hidden" name="upload_file_user[]" value="'+attachment.id+'"></div>');
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });
    /*
     * удаляем значение произвольного поля
     * если быть точным, то мы просто удаляем value у input type="hidden"
     */
    $('.upload-container, .upload-container-user').on('click', '.remove_image_button',function(){
        var r = confirm("Уверены?");
        if (r == true) {
            var src = $(this).parent().prev().attr('data-src');
            $(this).parent('.wraper-item-upload').remove();
        }
        return false;
    });
});