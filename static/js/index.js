$( '#skills' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
    tags: true
} );

var textareaIds = ['detail'];

    textareaIds.forEach(function(id) {
      CKEDITOR.replace(id);
    });

new DataTable('#example');
new DataTable('#example-2');
new DataTable('#example-3');