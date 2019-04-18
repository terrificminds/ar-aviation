jQuery(document).ready(function ($) {
    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;
    // Runs when the image button is clicked.
    $('.flights-chart-1-upload').click(function (e) {
      // Get preview pane
      var meta_image_preview = $('.flights-chart-1-preview .flights-chart-1-image');
      // Prevents the default action from occuring.
      e.preventDefault();
      var meta_image = $('.flights-chart-1');
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

    $('.flights-chart-2-upload').click(function (e) {
        var meta_chart_frame;
        // Get preview pane
        var meta_image_preview = $('.flights-chart-2-preview .flights-chart-2-image');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $('.flights-chart-2');
        // If the frame already exists, re-open it.
        if (meta_chart_frame) {
            meta_chart_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_chart_frame = wp.media.frames.meta_chart_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_chart_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_chart_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_chart_frame.open();
      });
  });
