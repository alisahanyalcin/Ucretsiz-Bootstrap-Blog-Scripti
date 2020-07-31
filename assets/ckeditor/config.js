/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = 'tr';
    config.allowedContent = true;
    config.extraAllowedContent = 'br';
    config.extraAllowedContent = '*(*)';
    config.extraAllowedContent = 'style';
    config.extraAllowedContent = 'class';
    config.filebrowserUploadMethod = 'form';
    config.enterMode = CKEDITOR.ENTER_BR;
};
