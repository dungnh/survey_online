'use strict';
/*! main.js - v0.1.1
 * http://admindesigns.com/
 * Copyright (c) 2015 Admin Designs;*/

/* Demo theme functions. Required for
 * Settings Pane and misc functions */
var App = function () {

    // App AdminForm Functions
    var runAppForms = function () {

        // Prevents directory response when submitting a demo form
        $('.admin-form').on('submit', function (e) {

            if ($('body.timeline-page').length || $('body.admin-validation-page').length) {
                return;
            }
            e.preventDefault;
            alert('Your form has submitted!');
            return false;
        });

        // give file-upload preview onclick functionality
        var fileUpload = $('.fileupload-preview');
        if (fileUpload.length) {

            fileUpload.each(function (i, e) {
                var fileForm = $(e).parents('.fileupload').find('.btn-file > input');
                $(e).on('click', function () {
                    fileForm.click();
                });
            });
        }

    }

    // Demo Header Functions
    var runAppTopbar = function () {

        // Init jQuery Multi-Select
        if ($("#topbar-multiple").length) {
            $('#topbar-multiple').multiselect({
                buttonClass: 'btn btn-default btn-sm ph15',
                dropRight: true
            });
        }

    }

    // Demo AdminForm Functions
    

    // DEMO FUNCTIONS - primarily trash
    var runAppSettings = function () {

        if ($('#skin-toolbox').length) {

            // Toggles Theme Settings Tray
            $('#skin-toolbox .panel-heading').on('click', function () {
                $('#skin-toolbox').toggleClass('toolbox-open');
            });
            // Disable text selection
            $('#skin-toolbox .panel-heading').disableSelection();

            // Cache component elements
            var Body = $('body');
            var Breadcrumbs = $('#topbar');
            var Sidebar = $('#sidebar_left');
            var Header = $('.navbar');
            var Branding = Header.children('.navbar-branding');

            // Possible Component Skins
            var headerSkins = "bg-primary bg-success bg-info bg-warning bg-danger bg-alert bg-system bg-dark";
            var sidebarSkins = "sidebar-light light dark";

            // Theme Settings
            var settingsObj = {
                // 'headerTone': true,
                'headerSkin': '',
                'sidebarSkin': 'sidebar-default',
                'headerState': 'navbar-fixed-top',
                'sidebarState': 'affix',
                'sidebarAlign': '',
                'breadcrumbState': 'relative',
                'breadcrumbHidden': 'visible',
            };

            // Local Storage Theme Key
            var themeKey = 'admin-settings1';

            // Local Storage Theme Get
            var themeGet = localStorage.getItem(themeKey);

            // Set new key if one doesn't exist
            if (themeGet === null) {
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));
                themeGet = localStorage.getItem(themeKey);
            }

            // Restore Theme Settings onload from Local Storage Key
            (function () {

                var settingsParse = JSON.parse(themeGet);
                settingsObj = settingsParse;

                $.each(settingsParse, function (i, e) {
                    switch (i) {
                        case 'headerSkin':
                            Header.removeClass(headerSkins).addClass(e);
                            Branding.removeClass(headerSkins).addClass(e + ' dark');
                            if (e === "bg-light") {
                                Branding.removeClass(headerSkins);
                            } else {
                                Branding.removeClass(headerSkins).addClass(e);
                            }
                            $('#toolbox-header-skin input[value="bg-light"]').prop('checked', false);
                            $('#toolbox-header-skin input[value="' + e + '"]').prop('checked', true);
                            break;
                        case 'sidebarSkin':
                            Sidebar.removeClass(sidebarSkins).addClass(e);
                            $('#toolbox-sidebar-skin input[value="bg-light"]').prop('checked', false);
                            $('#toolbox-sidebar-skin input[value="' + e + '"]').prop('checked', true);
                            break;
                        case 'headerState':
                            if (e === "navbar-fixed-top") {
                                Header.addClass('navbar-fixed-top');
                                $('#header-option').prop('checked', true);
                            } else {
                                Header.removeClass('navbar-fixed-top');
                                $('#header-option').prop('checked', false);

                                // Remove left over inline styles from nanoscroller plugin
                                Sidebar.nanoScroller({
                                    destroy: true
                                });
                                Sidebar.find('.nano-content').attr('style', '');
                                Sidebar.removeClass('affix');
                                $('#sidebar-option').prop('checked', false);
                            }
                            break;
                        case 'sidebarState':
                            if (e === "affix") {
                                Sidebar.addClass('affix');
                                $('#sidebar-option').prop('checked', true);
                            } else {
                                // Remove left over inline styles from nanoscroller plugin
                                Sidebar.nanoScroller({
                                    destroy: true
                                });
                                Sidebar.find('.nano-content').attr('style', '');
                                Sidebar.removeClass('affix');
                                $('#sidebar-option').prop('checked', false);
                            }
                            break;
                        case 'sidebarAlign':
                            if (e === "sb-top") {
                                Body.addClass('sb-top');
                                $('#sidebar-align').prop('checked', true);
                            } else {
                                Body.removeClass('sb-top');
                                $('#sidebar-align').prop('checked', false);
                            }
                            break;
                        case 'breadcrumbState':
                            if (e === "affix") {
                                Breadcrumbs.addClass('affix');
                                $('#breadcrumb-option').prop('checked', true);
                            } else {
                                Breadcrumbs.removeClass('affix');
                                $('#breadcrumb-option').prop('checked', false);
                            }
                            break;
                        case 'breadcrumbHidden':
                            if (Breadcrumbs.hasClass('hidden')) {
                                $('#breadcrumb-hidden').prop('checked', true);
                            }
                            else {
                                if (e === "hidden") {
                                    Breadcrumbs.addClass('hidden');
                                    $('#breadcrumb-hidden').prop('checked', true);
                                } else {
                                    Breadcrumbs.removeClass('hidden');
                                    $('#breadcrumb-hidden').prop('checked', false);
                                }
                            }
                            break;
                    }
                });

            })();

            // Header Skin Switcher
            $('#toolbox-header-skin input').on('click', function () {
                var This = $(this);
                var Val = This.val();
                var ID = This.attr('id');

                // Swap Header Skin
                Header.removeClass(headerSkins).addClass(Val);
                Branding.removeClass(headerSkins).addClass(Val + ' dark');

                // Save new Skin to Settings Key
                settingsObj['headerSkin'] = Val;
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));

            });

            // Sidebar Skin Switcher
            $('#toolbox-sidebar-skin input').on('click', function () {
                var Val = $(this).val();

                // Swap Sidebar Skin
                Sidebar.removeClass(sidebarSkins).addClass(Val);

                // Save new Skin to Settings Key
                settingsObj['sidebarSkin'] = Val;
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));
            });

            // Fixed Header Switcher
            $('#header-option').on('click', function () {
                var headerState = "navbar-fixed-top";

                if (Header.hasClass('navbar-fixed-top')) {
                    Header.removeClass('navbar-fixed-top');
                    headerState = "relative";

                    // Remove Fixed Sidebar option if navbar isnt fixed
                    Sidebar.removeClass('affix');

                    // Remove left over inline styles from nanoscroller plugin
                    Sidebar.nanoScroller({
                        destroy: true
                    });
                    Sidebar.find('.nano-content').attr('style', '');
                    Sidebar.removeClass('affix');
                    $('#sidebar-option').prop('checked', false);

                    $('#sidebar-option').parent('.checkbox-custom').addClass('checkbox-disabled').end().prop('checked', false).attr('disabled', true);
                    settingsObj['sidebarState'] = "";
                    localStorage.setItem(themeKey, JSON.stringify(settingsObj));

                    // Remove Fixed Breadcrumb option if navbar isnt fixed
                    Breadcrumbs.removeClass('affix');
                    $('#breadcrumb-option').parent('.checkbox-custom').addClass('checkbox-disabled').end().prop('checked', false).attr('disabled', true);
                    settingsObj['breadcrumbState'] = "";
                    localStorage.setItem(themeKey, JSON.stringify(settingsObj));

                } else {
                    Header.addClass('navbar-fixed-top');
                    headerState = "navbar-fixed-top";
                    // Enable fixed sidebar and breadcrumb options
                    $('#sidebar-option').parent('.checkbox-custom').removeClass('checkbox-disabled').end().attr('disabled', false);
                    $('#breadcrumb-option').parent('.checkbox-custom').removeClass('checkbox-disabled').end().attr('disabled', false);
                }

                // Save new setting to Settings Key
                settingsObj['headerState'] = headerState;
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));
            });

            // Fixed Sidebar Switcher
            $('#sidebar-option').on('click', function () {
                var sidebarState = "";

                if (Sidebar.hasClass('affix')) {

                    // Remove left over inline styles from nanoscroller plugin
                    Sidebar.nanoScroller({
                        destroy: true
                    });
                    Sidebar.find('.nano-content').attr('style', '');
                    Sidebar.removeClass('affix');

                    sidebarState = "";
                } else {
                    Sidebar.addClass('affix');
                    // If sidebar is fixed init nano scrollbar plugin

                    if ($('.nano.affix').length) {
                        $(".nano.affix").nanoScroller({
                            preventPageScrolling: true
                        });
                    }
                    sidebarState = "affix";

                }

                $(window).trigger('resize');

                // Save new setting to Settings Key
                settingsObj['sidebarState'] = sidebarState;
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));
            });

            // Sidebar Horizontal Setting Switcher
            $('#sidebar-align').on('click', function () {

                var sidebarAlign = "";

                if (Body.hasClass('sb-top')) {
                    Body.removeClass('sb-top');
                    sidebarAlign = "";
                } else {
                    Body.removeClass('sb-top');
                    sidebarAlign = "sb-top";
                }

                // Save new setting to Settings Key
                settingsObj['sidebarAlign'] = sidebarAlign;
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));
            });

            // Fixed Breadcrumb Switcher
            $('#breadcrumb-option').on('click', function () {

                var breadcrumbState = "";

                if (Breadcrumbs.hasClass('affix')) {
                    Breadcrumbs.removeClass('affix');
                    breadcrumbState = "";
                } else {
                    Breadcrumbs.addClass('affix');
                    breadcrumbState = "affix";
                }

                // Save new setting to Settings Key
                settingsObj['breadcrumbState'] = breadcrumbState;
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));
            });

            // Hidden Breadcrumb Switcher
            $('#breadcrumb-hidden').on('click', function () {
                var breadcrumbState = "";

                if (Breadcrumbs.hasClass('hidden')) {
                    Breadcrumbs.removeClass('hidden');
                    breadcrumbState = "";
                } else {
                    Breadcrumbs.addClass('hidden');
                    breadcrumbState = "hidden";
                }

                // Save new setting to Settings Key
                settingsObj['breadcrumbHidden'] = breadcrumbState;
                localStorage.setItem(themeKey, JSON.stringify(settingsObj));
            });

            // Clear local storage button and confirm dialog
            $("#clearLocalStorage").on('click', function () {

                // check for Bootbox plugin - should be in core
                if (bootbox.confirm) {
                    bootbox.confirm("Are You Sure?!", function (e) {

                        // e returns true if user clicks "accept"
                        // false if "cancel" or dismiss icon are clicked
                        if (e) {
                            // Timeout simply gives the user a second for the modal to
                            // fade away so they can visibly see the options reset
                            setTimeout(function () {
                                localStorage.clear();
                                location.reload();
                            }, 200);
                        } else {
                            return;
                        }
                    });

                }

            });

        }
    }

    var runFullscreenApp = function () {

        // If browser is IE we need to pass the fullsreen plugin the 'html' selector
        // rather than the 'body' selector. Fixes a fullscreen overflow bug
        var selector = $('html');

        var ua = window.navigator.userAgent;
        var old_ie = ua.indexOf('MSIE ');
        var new_ie = ua.indexOf('Trident/');
        if ((old_ie > -1) || (new_ie > -1)) {
            selector = $('body');
        }

        // Fullscreen Functionality
        var screenCheck = $.fullscreen.isNativelySupported();

        // Attach handler to navbar fullscreen button
        $('.request-fullscreen').on('click', function () {

            // Check for fullscreen browser support
            if (screenCheck) {
                if ($.fullscreen.isFullScreen()) {
                    $.fullscreen.exit();
                }
                else {
                    selector.fullscreen({
                        overflow: 'auto'
                    });
                }
            } else {
                alert('Your browser does not support fullscreen mode.')
            }
        });

    }

    return {
        init: function () {
            runAppForms();
            runAppTopbar();
            runAppSettings();
            runFullscreenApp();
        }
    }
}();
var modalContent = $('#modal-content');
function findActive() {
	var activeModal = modalContent.find('.holder-active').attr('href');
	return activeModal;
};
function showConfirm(url){
	$('#btnYes').attr('href',url);
	$.magnificPopup.open({
		removalDelay: 500, //delay removal by X to allow out-animation,
		items: {
			src: "#modal-panel"
		},
		// overflowY: 'hidden', // 
		callbacks: {
			beforeOpen: function(e) {
				this.st.mainClass = 'mfp-slideDown';
			}
		},
		midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
	});
}

