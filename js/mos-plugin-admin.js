jQuery(document).ready(function($) {
    $(window).load(function(){
      $('.mos-plugin-wrapper .tab-con').hide();
      $('.mos-plugin-wrapper .tab-con.active').show();
    });

    $('.mos-plugin-wrapper .tab-nav > a').click(function(event) {
      event.preventDefault();
      var id = $(this).data('id');

      set_mos_plugin_cookie('plugin_active_tab',id,1);
      $('#mos-plugin-'+id).addClass('active').show();
      $('#mos-plugin-'+id).siblings('div').removeClass('active').hide();

      $(this).closest('.tab-nav').addClass('active');
      $(this).closest('.tab-nav').siblings().removeClass('active');
    });
});
