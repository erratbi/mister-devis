export default {
  init() {
  
  },
  finalize() {
    
    $('#client-form').carousel({
      keyboard: false,
      wrap: false,
      slide: true,
      interval: false,
    }).on('slide.bs.carousel', function (e) {
      const nextH = $(e.relatedTarget).data('height');
      $(this).find('.form-content').animate({height: nextH}, 300);
    }).find('input[type="radio"]').on('change', function () {
      $('#client-form').carousel('next');
    });
    
    $('#client-form form').on('submit', function (e) {
      e.preventDefault();
      
      const data = {
        action: 'client_form',
        nom: $('input[name="nom"]').val(),
        prenom: $('input[name="prenom"]').val(),
        email: $('input[name="email"]').val(),
        telephone: $('input[name="telephone"]').val(),
        type_propriete: $('input[name="type_propriete"]').val(),
        type_batiment: $('input[name="type_batiment"]').val(),
        type_travaux: $('input[name="type_travaux"]').val(),
        delai_souhaite: $('input[name="delai_souhaite"]').val(),
        observation: $('textarea[name="observation"]').val(),
        cat: $('input[name="cat"]').val(),
      };
      
      $.post(wpadmin.ajax_url, data); // eslint-disable-line
      
      $('#client-form').carousel('next');
    });
    
    
    $('#more-toggle').on('click', function (e) {
      e.preventDefault();
      
      const target = $($(this).data('target'));
      
      $(this).hide();
      
      target.toggleClass('show');
      return false;
    });
  },
};
