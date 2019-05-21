jQuery(document).ready(function($){
  var form = $('#contaceForm')
  var action = form.attr('action');

  form.on('submit', function(event){
    var formData = {
      contactName: $('#contactName').val(),
      contactEmail: $('#contactEmail').val(),
      contactSubject: $('#contactSubject').val(),
      contactMessage: $('#contactMessage').val(),
    }
    $.ajax({
      url: action,
      type: 'default GET (Other values: POST)',
      dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: formData,
    })
    .done(function(){form.html('Успешный успех!')})
    .fail(function(){form.html('Провал!')})
    });
    event.preventDefault();
  });
});