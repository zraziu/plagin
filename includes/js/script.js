/***** FRONTEND *****/

/* Перетаскивание блоков */
$( function() {
    $( "#sortable" ).sortable({ handle:'i.vlg-two__move', placeholder: "vlg-placeholder" });
    $( "#sortable" ).disableSelection();
} );

