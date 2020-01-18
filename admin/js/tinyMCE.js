if (window.location.pathname === '/admin/posts.php') {
  tinymce.init({
    selector: 'textarea',
    images_upload_handler: function (blobInfo, success, failure) {
      var xhr, formData;

      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', './includes/postAcceptor.php');

      xhr.onload = function () {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }

        success(json.location);
      };

      formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());

      xhr.send(formData);
    },
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
    ],
    plugins: 'a11ychecker advcode casechange codesample formatpainter linkchecker image lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments codesample casechange checklist image code formatpainter insertfile pageembed permanentpen table',
    toolbar_drawer: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
  });
}