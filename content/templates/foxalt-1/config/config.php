<?php 
/*
* 
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<script type="text/javascript">
<?php if (_g('top') == 'yes'): ?>
document.writeln("<p id=\"back-to-top\"><a href=\"#top\"><span></span></a></p>");
$(document).ready(function() {
    $("#back-to-top").hide();
    $(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $("#back-to-top").fadeIn(500)
            } else {
                $("#back-to-top").fadeOut(500)
            }
        });
        $("#back-to-top").click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 250);
            return false
        })
    })
});
<?php endif; ?>
<?php if (_g('jq_title') == 'yes'): ?>
$(function() {
    $("#content h2 a").hover(function() {
        $(this).stop().animate({
            "margin-left": "5px"
        }, "fast")
    }, function() {
        $(this).stop().animate({
            "margin-left": "0px"
        }, "fast")
    })
});
<?php endif; ?>
<?php if (_g('edtSearch') == "yes"): ?>
$(document).ready(function() {
    jQuery.focusblurmenu = function(focusdom, focuswidthnew, animatetime) {
        var focusblurmenuid = $(focusdom);
        var defval = focusblurmenuid.val();
        var defwidth = focusblurmenuid.width();
        focusblurmenuid.focus(function() {
            var thisval = $(this).val();
            if (thisval == defval) {
                $(this).val("");
                $(this).animate({
                    width: "+" + focuswidthnew
                }, focuswidthnew).addClass("edtSearchfocus")
            }
        });
        focusblurmenuid.blur(function() {
            var thisval = $(this).val();
            if (thisval == "") {
                $(this).val(defval)
            }
            $(this).animate({
                width: "+" + defwidth
            }, focuswidthnew).removeClass("edtSearchfocus")
        })
    };
    $.focusblurmenu("#edtSearch", "160px", "300")
});
<?php endif ;?>
<?php if (_g('imgbox') == 'yes'): ?>
jQuery(function($) {
            $("#contentleft a:has(img)").slimbox({
                overlayOpacity: <?php echo _g('imgbox1'); ?>,
                overlayFadeDuration: <?php echo _g('imgbox2'); ?>,
                imageFadeDuration: <?php echo _g('imgbox3'); ?>,
                captionAnimationDuration: <?php echo _g('imgbox4'); ?>,
                loop:<?php echo _g('imgbox5'); ?>, 
                counterText:"<?php echo _g('imgbox6'); ?>"
            });
            });
<?php endif; ?>
</script>
<?php if (_g('imgbox') == 'yes'): ?>
<script src="<?php echo TEMPLATE_URL; ?>config/imgbox.js" type="text/javascript"></script>
<?php endif; ?>