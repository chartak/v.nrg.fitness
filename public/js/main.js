$(document).ready(function () {
  window._token = $('meta[name="csrf-token"]').attr('content')

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
        allEditors[i],
        {
            removePlugins: ['ImageUpload']
        }
    );
  }

  moment.updateLocale('en', {
    week: {dow: 1} // Monday is the first day of the week
  })

  $('.date').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en'
  })

  $('.datetime').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    locale: 'en',
    sideBySide: true
  })

  $('.timepicker').datetimepicker({
    format: 'HH:mm:ss'
  })

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2()

  $('.treeview').each(function () {
    var shouldExpand = false
    $(this).find('li').each(function () {
      if ($(this).hasClass('active')) {
        shouldExpand = true
      }
    })
    if (shouldExpand) {
      $(this).addClass('active')
    }
  })

  $('.scheduled_time').change(function() {
    let schedule = $("#scheduled_time option:selected").val();

    if(schedule != "") {
      //var returnVal = confirm("Are you sure?")
      //$(this).prop("checked", returnVal)
      $('#timefrom').prop('disabled', true);
      $('#timeto').prop('disabled', true);
    } else {
      $('#timefrom').prop('disabled', false);
      $('#timeto').prop('disabled', false);
    }
  })
  $('#duration_time').change(function() {
    if(this.checked) {
      //var returnVal = confirm("Are you sure?")
      //$(this).prop("checked", returnVal)
      $('#duration').prop('disabled', true);
     // $('#timeto').prop('disabled', true);
    } else {
      $('#duration').prop('disabled', false);
     // $('#timeto').prop('disabled', false);
    }
  })
  $('#scheduled_year').change(function() {
    if(this.checked) {
      $('#year_from').prop('disabled', true);
      $('#year_to').prop('disabled', true);
    } else {
      $('#year_from').prop('disabled', false);
      $('#year_to').prop('disabled', false);
    }
  })

})
