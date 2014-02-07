</div> <!-- end #wrapper -->
<footer id="footer" class="zone">
    <div class="wrap">
    	<div class="leftcol certs">
        	<a href="http://www.bcorporation.net/community/directory/tmi-consulting" class="bcorp"><img src="<?php bloginfo('template_directory'); ?>/images/bcorp_sm.gif" alt="B Corp"></a>
        	<a href="http://www.dmbe.virginia.gov/swamcert.html" class="swam"><img src="<?php bloginfo('template_directory'); ?>/images/swam.gif" alt="SWaM"></a>
        	<a href="http://www.nfbpa.org/" class="nfbpa"><img src="<?php bloginfo('template_directory'); ?>/images/nfbpa.gif" alt="NFBPA"></a>
        	<a href="http://www.eva.state.va.us/SWAM/index.htm" class="eva"><img src="<?php bloginfo('template_directory'); ?>/images/eva.gif" alt="eva"></a>
        	<a href="http://www.shrm.org/" class="shrm"><img src="<?php bloginfo('template_directory'); ?>/images/shrm.gif" alt="SHRM"></a>
            <a href="http://www.thembl.org//" class="mbl"><img src="<?php bloginfo('template_directory'); ?>/images/mbl.gif" alt="Metropolitan Business League"></a>
		<div class="clear"></div>
        </div>
        <div class="leftcol foot-nav">
            <?php $args = array(
                'theme_location'  => 'footer', 
                'container'       => 'false', 
                'menu_class'      => 'menu', 
                'menu_id'         => 'menu-footer',
            ); ?>
            
            <?php wp_nav_menu( $args ); ?>
        	<a class="facebook social" href="https://www.facebook.com/tmiconsulting">Facebook</a>
        	<a class="twitter social" href="https://twitter.com/tmi_consulting">Twitter</a>
        	<a class="linkedin social" title="TMI on LinkedIn" href="http://www.linkedin.com/company/tmi-consulting-inc">LinkedIn</a>
         </div>
        <div class="leftcol">
            <h3>804.225.5537<br />
            213 E Grace Street, #101<br />
            Richmond, Virginia 23219, USA <br />
            tmi@tmiconsultinginc.com</h3>
        </div>
	<div class="clear"></div>
   </div>
</footer>
<script type="text/javascript">
	var $j = jQuery.noConflict();
	
$j(document).ready(function() {
	$j('.slider').each(function(i) {
	$j(this).cycle({
		fx:    'fade', 
		speed:  500,
		timeout: 5000,
	//	containerResize: 0,
		next:'.slider'
		});
	});
	$j('#famslider').children().wrap('<div class="slide" />');
	$j('#famslider').cycle({
		fx:    'fade', 
		speed:  500,
		timeout: 5000,
	//	containerResize: 0,
		after: onAfter,
		height:'auto',
		next:'#famslider'
	});
    function onAfter(curr, next, opts, fwd) {
        //get the height of the current slide
        var ht = $j(this).height();
        //animates the container's height to that of the current slide 
        $j(this).parent().animate({ height: ht });
    }

});

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36555373-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php wp_footer(); ?>
</body>

</html>