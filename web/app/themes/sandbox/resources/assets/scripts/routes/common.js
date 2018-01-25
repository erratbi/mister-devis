export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    
    $('#artisan-signup-form').on('submit', function (e) {
      e.preventDefault();
      
      const data = {
        action: 'artisan_form',
        nom: $('input[name="nom"]').val(),
        prenom: $('input[name="prenom"]').val(),
        email: $('input[name="email"]').val(),
        telephone_portable: $('input[name="telephone_portable"]').val(),
        telephone_fixe: $('input[name="telephone_fixe"]').val(),
        login: $('input[name="login"]').val(),
        pass: $('input[name="pass"]').val(),
        horaireRDV: $('input[name="horaireRDV"]').val(),
        code_postal: $('input[name="code_postal"]').val(),
        raison_sociale: $('input[name="raison_sociale"]').val(),
        id_activite: $('select[name="id_activite"]').val(),
      };
      const submit_btn = $(this).find('[type="submit"]');
      
      submit_btn.attr('disabled', true).find('i.fa').attr('class', 'fa fa-circle-o-notch fa-spin');
      
      $.post(wpadmin.ajax_url, data, function () { // eslint-disable-line
        submit_btn.find('i.fa').attr('class', 'fa fa-check');
      });
      
    });
    
  },
};
