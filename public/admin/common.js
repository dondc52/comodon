$(document).ready(function() {
    $('.deleteStudent').click(function() {
        $('#deleteFormStudent').attr('action' , $(this).attr('data-action'));
    });
    $('#myModalBtn').click(function() {
        $('#deleteFormStudent').submit();
    });
    $(function () {
        $('#summernote').summernote()
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
          mode: "htmlmixed",
          theme: "monokai"
        });
      });
});