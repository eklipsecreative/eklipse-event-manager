(function() {
    tinymce.PluginManager.add('scripture', function( editor, url ) {
        editor.addButton( 'scripture', {
            text: 'Scripture',
            icon: false,
            onclick: function() {
                editor.windowManager.open( {
					title: 'Insert Scripture Reference',
					body: [{
						type: 'listbox',
						name: 'book',
						label: 'Book',
						'values': [
							{text: 'Genesis', value: 'Genesis'},
							{text: 'Exodus', value: 'Exodus'},
							{text: 'Leviticus', value: 'Leviticus'},
							{text: 'Numbers', value: 'Numbers'},
							{text: 'Deuteronomy', value: 'Deuteronomy'},
							{text: 'Joshua', value: 'Joshua'},
							{text: 'Judges', value: 'Judges'},
							{text: 'Ruth', value: 'Ruth'},
							{text: '1 Samuel', value: '1 Samuel'},
							{text: '2 Samuel', value: '2 Samuel'},
							{text: '1 Kings', value: '1Kings'},
							{text: '2 Kings', value: '2Kings'},
							{text: '1 Chronicles', value: '1Chronicles'},
							{text: '2 Chronicles', value: '2Chronicles'},
							{text: 'Ezra', value: 'Ezra'},
							{text: 'Nehemiah', value: 'Nehemiah'},
							{text: 'Esther', value: 'Esther'},
							{text: 'Job', value: 'Job'},
							{text: 'Psalms', value: 'Psalms'},
							{text: 'Proverbs', value: 'Proverbs'},
							{text: 'Ecclesiastes', value: 'Ecclesiastes'},
							{text: 'Song of Solomon', value: 'SongofSolomon'},
							{text: 'Isaiah', value: 'Isaiah'},
							{text: 'Jeremiah', value: 'Jeremiah'},
							{text: 'Lamentations', value: 'Lamentations'},
							{text: 'Ezekiel', value: 'Ezekiel'},
							{text: 'Daniel', value: 'Daniel'},
							{text: 'Hosea', value: 'Hosea'},
							{text: 'Joel', value: 'Joel'},
							{text: 'Amos', value: 'Amos'},
							{text: 'Obadiah', value: 'Obadiah'},
							{text: 'Jonah', value: 'Jonah'},
							{text: 'Micah', value: 'Micah'},
							{text: 'Nahum', value: 'Nahum'},
							{text: 'Habakkuk', value: 'Habakkuk'},
							{text: 'Zephaniah', value: 'Zephaniah'},
							{text: 'Haggai', value: 'Haggai'},
							{text: 'Zechariah', value: 'Zechariah'},
							{text: 'Malachi', value: 'Malachi'},
							{text: 'Matthew', value: 'Matthew'},
							{text: 'Mark', value: 'Mark'},
							{text: 'Luke', value: 'Luke'},
							{text: 'John', value: 'John'},
							{text: 'Acts', value: 'Acts'},
							{text: 'Romans', value: 'Romans'},
							{text: '1 Corinthians', value: '1Corinthians'},
							{text: '2 Corinthians', value: '2Corinthians'},
							{text: 'Galatians', value: 'Galatians'},
							{text: 'Ephesians', value: 'Ephesians'},
							{text: 'Philippians', value: 'Philippians'},
							{text: 'Colossians', value: 'Colossians'},
							{text: '1 Thessalonians', value: '1Thessalonians'},
							{text: '2 Thessalonians', value: '2Thessalonians'},
							{text: '1 Timothy', value: '1Timothy'},
							{text: '2 Timothy', value: '2Timothy'},
							{text: 'Titus', value: 'Titus'},
							{text: 'Philemon', value: 'Philemon'},
							{text: 'Hebrews', value: 'Hebrews'},
							{text: 'James', value: 'James'},
							{text: '1 Peter', value: '1Peter'},
							{text: '2 Peter', value: '2Peter'},
							{text: '1 John', value: '1John'},
							{text: '2 John', value: '2John'},
							{text: '3 John', value: '3John'},
							{text: 'Jude', value: 'Jude'},
							{text: 'Revelation', value: 'Revelation'}
							]
					},
					{
						type: 'textbox',
						name: 'chapter',
						label: 'Chapter'
					},
					{
						type: 'textbox',
						name: 'verse',
						label: 'Verse(s)'
					}],
					onsubmit: function( e ) {
						editor.insertContent( '[scripture book="' + e.data.book + '" chapter="' + e.data.chapter + '" verse="' + e.data.verse + '" ]');
					}
				});
            }
        });
    });
})();

