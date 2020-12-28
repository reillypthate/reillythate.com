/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html
	config.allowedContent = true;
	config.extraAllowedContent = 'figure div';
	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = '';//'Underline,Subscript,Superscript';
	
	// Set the most common block elements.
	config.format_tags = 'p;h3;h4;h5;h6;pre;address;div';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	CKEDITOR.stylesSet.add( 'trick_styles', [
		/* Custom Styles */
		{
			name: 'Gallery: 1x1',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-1 rows-1'
			}
		},
		{
			name: 'Gallery: 2x1',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-2 rows-1'
			}
		},
		{
			name: 'Gallery: 3x1',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-3 rows-1'
			}
		},
		{
			name: 'Gallery: 4x1',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-4 rows-1'
			}
		},
		{
			name: 'Gallery: 1x2',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-1 rows-2'
			}
		},
		{
			name: 'Gallery: 2x2',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-2 rows-2'
			}
		},
		{
			name: 'Gallery: 3x2',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-3 rows-2'
			}
		},
		{
			name: 'Gallery: 4x2',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-4 rows-2'
			}
		},
		{
			name: 'Gallery: 1x3',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-1 rows-3'
			}
		},
		{
			name: 'Gallery: 2x3',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-2 rows-3'
			}
		},
		{
			name: 'Gallery: 3x3',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-3 rows-3'
			}
		},
		{
			name: 'Gallery: 4x3',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-4 rows-3'
			}
		},
		{
			name: 'Gallery: 1x4',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-1 rows-4'
			}
		},
		{
			name: 'Gallery: 2x4',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-2 rows-4'
			}
		},
		{
			name: 'Gallery: 3x4',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-3 rows-4'
			}
		},
		{
			name: 'Gallery: 4x4',
			element: 'div',
			attributes: {
				'class': 'blog-gallery cols-4 rows-4'
			}
		},
		
		/* Block styles */

		// These styles are already available in the "Format" drop-down list ("format" plugin),
		// so they are not needed here by default. You may enable them to avoid
		// placing the "Format" combo in the toolbar, maintaining the same features.
		/*
		{ name: 'Paragraph',		element: 'p' },
		{ name: 'Heading 1',		element: 'h1' },
		{ name: 'Heading 2',		element: 'h2' },
		{ name: 'Heading 3',		element: 'h3' },
		{ name: 'Heading 4',		element: 'h4' },
		{ name: 'Heading 5',		element: 'h5' },
		{ name: 'Heading 6',		element: 'h6' },
		{ name: 'Preformatted Text',element: 'pre' },
		{ name: 'Address',			element: 'address' },
		*/

		{ name: 'Italic Title',		element: 'h2', styles: { 'font-style': 'italic' } },
		{ name: 'Subtitle',			element: 'h3', styles: { 'color': '#aaa', 'font-style': 'italic' } },
		{
			name: 'Special Container',
			element: 'div',
			styles: {
				padding: '5px 10px',
				background: '#eee',
				border: '1px solid #ccc'
			}
		},

		/* Inline styles */

		// These are core styles available as toolbar buttons. You may opt enabling
		// some of them in the Styles drop-down list, removing them from the toolbar.
		// (This requires the "stylescombo" plugin.)
		/*
		{ name: 'Strong',			element: 'strong', overrides: 'b' },
		{ name: 'Emphasis',			element: 'em'	, overrides: 'i' },
		{ name: 'Underline',		element: 'u' },
		{ name: 'Strikethrough',	element: 'strike' },
		{ name: 'Subscript',		element: 'sub' },
		{ name: 'Superscript',		element: 'sup' },
		*/

		{ name: 'Marker',			element: 'span', attributes: { 'class': 'marker' } },

		{ name: 'Big',				element: 'big' },
		{ name: 'Small',			element: 'small' },
		{ name: 'Typewriter',		element: 'tt' },

		{ name: 'Computer Code',	element: 'code' },
		{ name: 'Keyboard Phrase',	element: 'kbd' },
		{ name: 'Sample Text',		element: 'samp' },
		{ name: 'Variable',			element: 'var' },

		{ name: 'Deleted Text',		element: 'del' },
		{ name: 'Inserted Text',	element: 'ins' },

		{ name: 'Cited Work',		element: 'cite' },
		{ name: 'Inline Quotation',	element: 'q' },

		{ name: 'Language: RTL',	element: 'span', attributes: { 'dir': 'rtl' } },
		{ name: 'Language: LTR',	element: 'span', attributes: { 'dir': 'ltr' } },

		/* Object styles */

		{
			name: 'Styled Image (left)',
			element: 'img',
			attributes: { 'class': 'left' }
		},

		{
			name: 'Styled Image (right)',
			element: 'img',
			attributes: { 'class': 'right' }
		},

		{
			name: 'Compact Table',
			element: 'table',
			attributes: {
				cellpadding: '5',
				cellspacing: '0',
				border: '1',
				bordercolor: '#ccc'
			},
			styles: {
				'border-collapse': 'collapse'
			}
		},

		{ name: 'Borderless Table',		element: 'table',	styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
		{ name: 'Square Bulleted List',	element: 'ul',		styles: { 'list-style-type': 'square' } },

		/* Widget styles */

		{ name: 'Clean Image', type: 'widget', widget: 'image', attributes: { 'class': 'image-clean' } },
		{ name: 'Grayscale Image', type: 'widget', widget: 'image', attributes: { 'class': 'image-grayscale' } },

		{ name: 'Featured Snippet', type: 'widget', widget: 'codeSnippet', attributes: { 'class': 'code-featured' } },

		{ name: 'Featured Formula', type: 'widget', widget: 'mathjax', attributes: { 'class': 'math-featured' } },

		{ name: '240p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-240p' }, group: 'size' },
		{ name: '360p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-360p' }, group: 'size' },
		{ name: '480p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-480p' }, group: 'size' },
		{ name: '720p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-720p' }, group: 'size' },
		{ name: '1080p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-1080p' }, group: 'size' },

		// Adding space after the style name is an intended workaround. For now, there
		// is no option to create two styles with the same name for different widget types. See https://dev.ckeditor.com/ticket/16664.
		{ name: '240p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-240p' }, group: 'size' },
		{ name: '360p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-360p' }, group: 'size' },
		{ name: '480p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-480p' }, group: 'size' },
		{ name: '720p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-720p' }, group: 'size' },
		{ name: '1080p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-1080p' }, group: 'size' }

	] );
	config.stylesSet = 'trick_styles';
	console.log(config.stylesSet);
	config.stylesSet = 'trick_styles';
};
