jQuery(document).ready(function($) {
        if (window.innerWidth > 700) {
                $('#previewpins').css('width', window.innerWidth - 367);
        } else {
                $('#previewpins').css('width', "");
        }
        $(window).resize(function() {
                if (window.innerWidth > 700) {
                        $('#previewpins').css('width', window.innerWidth - 367);
                } else {
                        $('#previewpins').css('width', "");
                }
        });

        function storevalues() {
                var realpinvals = {}
                $('input, select').each(function() {
                        var name = $(this).attr('id');
                        if ($(this).attr("type") == "checkbox") {
                                if ($(this).is(":checked")) {
                                        var value = 1;
                                } else {
                                        var value = 0;
                                }
                        } else {
                                var value = $(this).val();
                        }
                        realpinvals[name] = value;
                        localStorage.setItem('RealPinvals', JSON.stringify(realpinvals));
                })
        }

        function retrievevalues() {
			if(localStorage.getItem('RealPinvals')){
                var retrievedpinvals = JSON.parse(localStorage.getItem('RealPinvals'));
                for (var name in retrievedpinvals) {
                        var id = name;
                        var value = retrievedpinvals[name];
                        if ($(".pinwidget").find("#" + id).attr("type") == "checkbox" && value == 1) {
                                $(".pinwidget").find("#" + id).attr("checked")
                        } else if ($(".pinwidget").find("#" + id).attr("type") == "checkbox" && value == 0) {
                                $(".pinwidget").find("#" + id).removeAttr("checked")
                        } else {
                                $(".pinwidget").find("#" + id).val(value)
                        }
                }
			}	
        }
        retrievevalues();
        if ($("select.inputdescr").val() == "trim") {
                $("div.trimto input").removeClass("ctrldisabled").removeAttr("disabled");
                $("div.trimto span").removeClass("ctrldisabled");
        } else {
                $("div.trimto input").addClass("ctrldisabled").attr("disabled", "disabled");
                $("div.trimto span").addClass("ctrldisabled");
        }
        if ($("select.inputgal").val() == "yes") {
                $(".galoptions").find("select").removeAttr("disabled");
                $(".galoptions").removeClass("ctrldisabled");
                $(".galoptions").height("auto");
        } else {
                $(".galoptions").find("select").attr("disabled");
                $(".galoptions").addClass("ctrldisabled");
                $(".galoptions").height(0);
        }

        function generatedivcode() {
                if ($("input.inputboard").val().length) {
                        var pintype = "board";
                } else {
                        var pintype = "user";
                }
                var username = $("input.inputuser").val();
                var board = $("input.inputboard").val();
                if ($("input.inputheader:checked").length) {
                        var header = "yes";
                } else {
                        var header = "no";
                }
                if ($("input.inputresponsive:checked").length || Number($("input.inputwidth").val()) <= 0 || isNaN(Number($("input.inputwidth").val()))) {
                        var width = "responsive";
                } else {
                        var width = Number($("input.inputwidth").val());
                }
                if ($("input.inputautoheight:checked").length || Number($("input.inputheight").val()) <= 0 || isNaN(Number($("input.inputheight").val()))) {
                        var height = "auto";
                } else {
                        var height = Number($("input.inputheight").val());
                }
                if ($("input.inputdefaultwidth:checked").length || Number($("input.inputpinwidth").val()) <= 0 || isNaN(Number($("input.inputpinwidth").val()))) {
                        var pwidth = 237;
                } else {
                        var pwidth = Number($("input.inputpinwidth").val());
                }
                if ($("input.inputpinmax:checked").length || Number($("input.inputpinstoshow").val()) <= 0 || Number($("input.inputpinstoshow").val()) > 50 || isNaN(Number($("input.inputpinstoshow").val()))) {
                        var ptoshow = 50;
                } else {
                        var ptoshow = Number($("input.inputpinstoshow").val());
                }
                if ($("input.inputshowpinbtn:checked").length) {
                        var showpbtn = "yes"
                } else {
                        var showpbtn = "no"
                };
                if ($("input.inputshowsrc:checked").length) {
                        var showpsrc = "yes"
                } else {
                        var showpsrc = "no"
                };
                if ($("select.inputdescr").val() == "yes") {
                        var descrlength = -1;
                } else if ($("select.inputdescr").val() == "no") {
                        var descrlength = 0;
                } else {
                        if (Number($("input.inputdescrlength").val()) > 0) {
                                var descrlength = $("input.inputdescrlength").val()
                        } else {
                                var descrlength = -1;
                        }
                };
                if ($("select.inputgal").val() == "yes") {
                        var showgallery = "yes";
                } else {
                        var showgallery = "no"
                }
                if ($("select.inputgalcap").val() == "yes") {
                        var showgallerycap = "yes";
                } else {
                        var showgallerycap = "no"
                }
                if ($("select.inputgalanim").val() == "fadeIn") {
                        var galleryanim = "fadeIn";
                } else if ($("select.inputgalanim").val() == "slideIn") {
                        var galleryanim = "slideIn";
                } else {
                        var galleryanim = "none";
                }
                var resultdiv = "<div data-pin data-pin-type='" + pintype + "' data-pin-user='" + username + "' data-pin-board='" + board + "' data-pin-header='" + header + "' data-pin-width='" + width + "' data-pin-height='" + height + "' data-pin-pinwidth='" + pwidth + "' data-pin-limit='" + ptoshow + "'   data-pin-pinbutton='" + showpbtn + "' data-pin-sourcelink='" + showpsrc + "' data-pin-descrlength='" + descrlength + "' data-pin-gallery='" + showgallery + "' data-pin-gallery-captions='" + showgallerycap + "' data-pin-gallery-animation='" + galleryanim + "'></div>"
                return resultdiv;
        }

        function generateshortcode() {
                var shortcode = "[pinworks+"
                if ($("input.inputboard").val().length) {
                        var pintype = " type='board'";
                        var shortcode = shortcode + pintype;
                }
                var username = " user='" + $("input.inputuser").val() + "'";
                var shortcode = shortcode + username;
                if ($("input.inputboard").val().length) {
                        var board = " board='" + $("input.inputboard").val() + "'";
                        var shortcode = shortcode + board;
                }
                if (!$("input.inputheader:checked").length) {
                        var shortcode = shortcode + " header='no'"
                }
                if ($("input.inputresponsive:checked").length == 0 && Number($("input.inputwidth").val()) > 0) {
                        var width = " width='" + Number($("input.inputwidth").val()) + "'";
                        var shortcode = shortcode + width;
                }
                if ($("input.inputautoheight:checked").length == 0 && Number($("input.inputheight").val()) > 0) {
                        var height = " height='" + Number($("input.inputheight").val()) + "'";
                        var shortcode = shortcode + height;
                }
                if ($("input.inputdefaultwidth:checked").length == 0 && Number($("input.inputpinwidth").val()) > 0) {
                        var pwidth = " pinwidth='" + Number($("input.inputpinwidth").val()) + "'";
                        var shortcode = shortcode + pwidth;
                }
                if ($("input.inputpinmax:checked").length == 0 && Number($("input.inputpinstoshow").val()) >= 0 && Number($("input.inputpinstoshow").val()) < 50) {
                        var ptoshow = " limit='" + Number($("input.inputpinstoshow").val()) + "'";
                        var shortcode = shortcode + ptoshow;
                }
                if ($("input.inputshowpinbtn:checked").length == 0) {
                        var showpbtn = "no";
                        var shortcode = shortcode + " pinbutton='no'";
                }
                if ($("input.inputshowsrc:checked").length == 0) {
                        var showpsrc = "no";
                        var shortcode = shortcode + " sourcelink='no'";
                }
                if ($("select.inputdescr").val() == "no") {
                        var descrlength = " descrlength='" + Number($("input.inputdescrlength").val()) + "'";
                        var shortcode = shortcode + " descrlength='0'";
                }
                if ($("select.inputdescr").val() == "trim" && Number($("input.inputdescrlength").val()) > 0) {
                        var descrlength = " descrlength='" + Number($("input.inputdescrlength").val()) + "'";
                        var shortcode = shortcode + descrlength;
                }
                if ($("select.inputgal").val() == "yes") {
                        var pgal = " gallery='yes'";
                        var shortcode = shortcode + pgal;
                        if ($("select.inputgalcap").val() == "yes") {
                                var pgalcap = " captions='yes'";
                                var shortcode = shortcode + pgalcap;
                        }
                        if ($("select.inputgalanim").val() == "fadeIn") {
                                var pgalanim = " transition='fadeIn'";
                                var shortcode = shortcode + pgalanim;
                        } else if ($("select.inputgalanim").val() == "none") {
                                var pgalanim = " transition='none'";
                                var shortcode = shortcode + pgalanim;
                        } else {};
                }
                var shortcode = shortcode + " ]"
                return shortcode;
        }
        $("input").each(function() {
                if ($(this).prop("checked")) {
                        $(this).closest("div").find("div").find("input").addClass("ctrldisabled").attr("disabled", "disabled");
                        $(this).closest("div").find("div").find("span").addClass("ctrldisabled").attr("disabled", "disabled");;
                } else {
                        $(this).closest("div").find("div").find("input").removeClass("ctrldisabled").removeAttr("disabled");
                        $(this).closest("div").find("div").find("span").removeClass("ctrldisabled").removeAttr("disabled");
                }
        })
        $("input").bind("change paste keyup", function() {
                if ($(this).prop("checked")) {
                        $(this).closest("div").find("div").find("input").addClass("ctrldisabled").attr("disabled", "disabled");
                        $(this).closest("div").find("div").find("span").addClass("ctrldisabled").attr("disabled", "disabled");;
                } else {
                        $(this).closest("div").find("div").find("input").removeClass("ctrldisabled").removeAttr("disabled");
                        $(this).closest("div").find("div").find("span").removeClass("ctrldisabled").removeAttr("disabled");
                }
                storevalues();
        })
        $("#previewpins").append(generatedivcode());
        setTimeout(function() {
                Artorius_pinWidget()
        }, 300);
        var generatetimer;
        $("input, select").bind("change", function() {
                clearTimeout(generatetimer);
                setTimeout(function() {
                        $("div[data-pin]").remove();
                        $("#previewpins").append(generatedivcode());
                        Artorius_pinWidget();
                }, 200);
                storevalues();
        });
        $("select.inputdescr").bind("change", function() {
                if ($("select.inputdescr").val() == "trim") {
                        $("div.trimto input").removeClass("ctrldisabled").removeAttr("disabled");
                        $("div.trimto span").removeClass("ctrldisabled");
                } else {
                        $("div.trimto input").addClass("ctrldisabled").attr("disabled", "disabled");
                        $("div.trimto span").addClass("ctrldisabled");
                }
                storevalues();
        });
        $("select.inputgal").bind("change", function() {
                if ($("select.inputgal").val() == "yes") {
                        $(".galoptions").find("select").removeAttr("disabled");
                        $(".galoptions").removeClass("ctrldisabled");
                        $(".galoptions").height("auto");
                } else {
                        $(".galoptions").find("select").attr("disabled");
                        $(".galoptions").addClass("ctrldisabled");
                        $(".galoptions").height(0);
                }
                storevalues();
        });
        $(".getpincode").click(function(event) {
                event.preventDefault();
                top.tinymce.activeEditor.selection.setContent(generateshortcode());
                top.tinymce.activeEditor.windowManager.close();
        });
});