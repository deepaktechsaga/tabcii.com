
// Form-Component.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - Designbudy.com -


$(document).ready(function() {



	// FULLSCREEN PANEL
	// =================================================================
	// Require Nyasa Admin Javascript
	// Designbudy.com
	// =================================================================

    $("[data-click=panel-expand]").click(function(e) {
        e.preventDefault();
        var t = $(this).closest(".panel");
        if ($("body").hasClass("panel-expand") && $(t).hasClass("panel-expand")) {
            $("body, .panel").removeClass("panel-expand");
            $(".panel").removeAttr("style")
        } else {
            $("body").addClass("panel-expand");
            $(this).closest(".panel").addClass("panel-expand")
        }
        $(window).trigger("resize")
    });


	// COLLAPSE PANEL
	// =================================================================
	// Require Nyasa Admin Javascript
	// Designbudy.com
	// =================================================================

    $("[data-click=panel-collapse]").click(function(e) {
        e.preventDefault();
        $(this).closest(".panel").find(".panel-body").slideToggle()
    });


	// RELOAD PANEL
	// =================================================================
	// Require Nyasa Admin Javascript
	// Designbudy.com
	// =================================================================


    $("[data-click=panel-reload]").click(function(e) {
        e.preventDefault();
        var t = $(this).closest(".panel");
        if (!$(t).hasClass("panel-loading")) {
            var n = $(t).find(".panel-body");
            var r = '<div class="panel-loader"><span class="spinner-small"></span></div>';
            $(t).addClass("panel-loading");
            $(n).prepend(r);
            setTimeout(function() {
                $(t).removeClass("panel-loading");
                $(t).find(".panel-loader").remove()
            }, 2000)
        }
    });


	// JQUERY TAG IT - COMPONENT
	// =================================================================
	// Require Jquery Tag It 
	// https://github.com/aehlke/tag-it
	// =================================================================

    $("#jquery-tagIt-default").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-inverse").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-white").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-primary").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-info").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-success").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-warning").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    });
    $("#jquery-tagIt-danger").tagit({
        availableTags: ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"]
    })



	// CHOSEN
	// =================================================================
	// Require Chosen
	// http://harvesthq.github.io/chosen/
	// =================================================================
	$('.demo-chosen-select').chosen({width:'100%'});
	$('.demo-cs-multiselect').chosen({width:'100%'});


	
	// BOOTSTRAP TIMEPICKER
	// =================================================================
	// Require Bootstrap Timepicker
	// http://jdewit.github.io/bootstrap-timepicker/
	// =================================================================
	$('#demo-tp-com').timepicker();



	// BOOTSTRAP TIMEPICKER - COMPONENT
	// =================================================================
	// Require Bootstrap Timepicker
	// http://jdewit.github.io/bootstrap-timepicker/
	// =================================================================
	$('#demo-tp-textinput').timepicker({
		minuteStep: 5,
		showInputs: false,
		disableFocus: true
	});


	// BOOTSTRAP DATEPICKER
	// =================================================================
	// Require Bootstrap Datepicker
	// http://eternicode.github.io/bootstrap-datepicker/
	// =================================================================
	$('#demo-dp-txtinput input').datepicker();


	// BOOTSTRAP DATEPICKER WITH AUTO CLOSE
	// =================================================================
	// Require Bootstrap Datepicker
	// http://eternicode.github.io/bootstrap-datepicker/
	// =================================================================
	$('#demo-dp-component .input-group.date').datepicker({autoclose:true});


	// BOOTSTRAP DATEPICKER WITH RANGE SELECTION
	// =================================================================
	// Require Bootstrap Datepicker
	// http://eternicode.github.io/bootstrap-datepicker/
	// =================================================================
	$('#demo-dp-range .input-daterange').datepicker({
		format: "MM dd, yyyy",
		todayBtn: "linked",
		autoclose: true,
		todayHighlight: true
	});


	// INLINE BOOTSTRAP DATEPICKER
	// =================================================================
	// Require Bootstrap Datepicker
	// http://eternicode.github.io/bootstrap-datepicker/
	// =================================================================
	$('#demo-dp-inline div').datepicker({
	format: "MM dd, yyyy",
	todayBtn: "linked",
	autoclose: true,
	todayHighlight: true
	});


	// MASKED INPUT
	// =================================================================
	// Require Masked Input
	// http://digitalbush.com/projects/masked-input-plugin/
	// =================================================================


	// Initialize Masked Inputs
	// a - Represents an alpha character (A-Z,a-z)
	// 9 - Represents a numeric character (0-9)
	// * - Represents an alphanumeric character (A-Z,a-z,0-9)
	$('#demo-msk-date').mask('99/99/9999');
	$('#demo-msk-date2').mask('99-99-9999');
	$('#demo-msk-phone').mask('(999) 999-9999');
	$('#demo-msk-taxid').mask('99-9999999');
	$('#demo-msk-ssn').mask('999-99-9999');
	$('#demo-msk-pkey').mask('aaaa*-aaaa*-aaaa*-aaaa*-aaaa*');
	$('#demo-msk-currency').mask('$ 999,999,999.99');
	$('#demo-msk-ipv6').mask('9999:9999:9999:9:999:9999:9999:9999');
	$('#demo-msk-ipv4').mask('999.999.999.999');
	$('#demo-msk-isbn2').mask('999/99/999/9999/9');
	$('#demo-msk-isbn1').mask('999-99-999-9999-9');



});
