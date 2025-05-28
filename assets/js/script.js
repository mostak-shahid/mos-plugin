jQuery(document).ready(function($) {    
    $(document).on('input', '.plugin_name', function(e){ // keypress keyup keydown change 
        var $this = $(this);
        var plugin_name = $this.val();
        var default_plugin_name = $this.data('default');
        if (!plugin_name) {
            plugin_name = default_plugin_name;
        }
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.live-preview-title').html(plugin_name);
    });
    $(document).on('input', '.plugin_slug', function(e){ // keypress keyup keydown change 
        var $this = $(this);
        var plugin_slug = $this.val();
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.plugin-slug-result').html(plugin_slug);
    });
    $(document).on('input', '.plugin_url', function(e){ // keypress keyup keydown change 
        var $this = $(this);
        var plugin_url = $this.val();
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.plugin-url-result').html(plugin_url);
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.action-button-view-details').attr('href',plugin_url);
    });
    $(document).on('input', '.author_name', function(e){ // keypress keyup keydown change 
        var $this = $(this);
        var author_name = $this.val();
        var default_author_name = $this.data('default');
        if (!author_name) {
            author_name = default_author_name;
        }
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.action-button-author-name').html(author_name);
    });
    $(document).on('input', '.author_email', function(e){ // keypress keyup keydown change 
        var $this = $(this);
        var author_email = $this.val();
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.author-email-result').html(author_email);
    });
    $(document).on('input', '.author_url', function(e){ // keypress keyup keydown change 
        var $this = $(this);
        var author_url = $this.val();
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.author-url-result').html(author_url);
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.action-button-author-name').attr('href',author_url);
    });
    $(document).on('input', '.plugin_description', function(e){ // keypress keyup keydown change 
        var $this = $(this);
        var plugin_description = $this.val();
        $this.closest('.pl_wp_plugin_boilerplate_generator_form_wrapper').find('.live-preview').find('.short-description-result').html(plugin_description);
    });
});