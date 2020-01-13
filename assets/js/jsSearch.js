$(document).ready(function(){
    $('select').formSelect();

    $('.chips-autocomplete').chips({
      autocompleteOptions: {
        data: {
          'Apple': null,
          'Microsoft': null,
          'Google': null
        },
        limit: Infinity,
        minLength: 1
      }
    });

    // var chip = {
    //     tag: 'chip content',
    //     image: '', //optional
    //   };


})