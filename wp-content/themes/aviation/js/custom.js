jQuery(document).ready(function ($) {
    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;
    // Runs when the image button is clicked.
    $('.partner-logo-upload').click(function (e) {
      // Get preview pane
      var meta_image_preview = $('.partner-logo-preview .partner-logo');
      // Prevents the default action from occuring.
      e.preventDefault();
      var meta_image = $('.partnerlogo');
      // If the frame already exists, re-open it.
      if (meta_image_frame) {
        meta_image_frame.open();
        return;
      }
      // Sets up the media library frame
      meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_image.title,
        button: {
          text: meta_image.button
        }
      });
      // Runs when an image is selected.
      meta_image_frame.on('select', function () {
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.
        meta_image.val(media_attachment.url);
        meta_image_preview.attr('src', media_attachment.url);
      });
      // Opens the media library frame.
      meta_image_frame.open();
    });

    $('.partner-modal-image-upload').click(function (e) {
      var meta_image_frame;
      // Get preview pane
      var meta_image_preview = $('.partner-image-preview .partner-modal-image');
      // Prevents the default action from occuring.
      e.preventDefault();
      var meta_image = $('.partner-modal-image');
      // If the frame already exists, re-open it.
      if (meta_image_frame) {
        meta_image_frame.open();
        return;
      }
      // Sets up the media library frame
      meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_image.title,
        button: {
          text: meta_image.button
        }
      });
      // Runs when an image is selected.
      meta_image_frame.on('select', function () {
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.
        meta_image.val(media_attachment.url);
        meta_image_preview.attr('src', media_attachment.url);
      });
      // Opens the media library frame.
      meta_image_frame.open();
    });

    $('.partner-modal-logo-upload').click(function (e) {
      var meta_logo_frame;
      // Get preview pane
      var meta_logo_preview = $('.partner-logo-preview .partner-modal-logo');
      // Prevents the default action from occuring.
      e.preventDefault();
      var meta_logo = $('.partner-modal-logo');
      // If the frame already exists, re-open it.
      if (meta_logo_frame) {
        meta_logo_frame.open();
        return;
      }
      // Sets up the media library frame
      meta_logo_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_logo.title,
        button: {
          text: meta_logo.button
        }
      });
      // Runs when an image is selected.
      meta_logo_frame.on('select', function () {
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_logo_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.
        meta_logo.val(media_attachment.url);
        meta_logo_preview.attr('src', media_attachment.url);
      });
      // Opens the media library frame.
      meta_logo_frame.open();
    });

    $('.news-banner-upload').click(function (e) {
      var meta_logo_frame;
      // Get preview pane
      var meta_logo_preview = $('.news-banner-preview .news-banner');
      // Prevents the default action from occuring.
      e.preventDefault();
      var meta_logo = $('.newsbanner');
      // If the frame already exists, re-open it.
      if (meta_logo_frame) {
        meta_logo_frame.open();
        return;
      }
      // Sets up the media library frame
      meta_logo_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_logo.title,
        button: {
          text: meta_logo.button
        }
      });
      // Runs when an image is selected.
      meta_logo_frame.on('select', function () {
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_logo_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.
        meta_logo.val(media_attachment.url);
        meta_logo_preview.attr('src', media_attachment.url);
      });
      // Opens the media library frame.
      meta_logo_frame.open();
    });
    
  });
