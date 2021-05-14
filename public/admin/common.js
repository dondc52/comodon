$(document).ready(function () {
  $('.delete').click(function () {
    $('#deleteForm').attr('action', $(this).attr('data-action'));
  });
  $('#deleteBtn').click(function () {
    $('#deleteForm').submit();
  });

  $('.update').click(function () {
    $('#updateForm').attr('action', $(this).attr('data-action'));
  });
  $('#updateBtn').click(function () {
    $('#updateForm').submit();
  });

  $(function () {
    $('#summernote').summernote()
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  });

  $('.selectDon').on('change', function() {
    $("#submitDon" ).submit();
  });

  $('.selectDonBt').on('change', function() {
    $("#submitDonBt" ).submit();
  });

  $('.status').on('change', function(){
    $(this).parent().parent().submit();
  });

});