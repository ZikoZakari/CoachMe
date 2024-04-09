$( '#multiple-select-custom-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
    tags: true
} );

var textareaIds = [''];

    textareaIds.forEach(function(id) {
      CKEDITOR.replace(id);
    });

// $(document).ready(function() {
//     $('#logout').click(function() {
//         // Requête AJAX pour appeler la fonction PHP
//         $.ajax({
//             url: '../../Classes/Users/User.php',
//             type: 'POST',
//             data: { action: 'logout' },
//             success: function(response) {
//                 alert(response); // Afficher la réponse de la fonction PHP
//             },
//             // error: function(xhr, status, error) {
//             //     console.error(xhr.responseText); // Afficher l'erreur en cas d'échec
//             // }
//         });
//     });
// });