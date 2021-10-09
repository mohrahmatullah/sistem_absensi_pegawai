<!-- jQuery 3 -->
<script src="{{asset('assets/admin')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/admin')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/admin')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('assets/admin')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/admin')}}/dist/js/demo.js"></script>
<!-- Sweetalert -->
<script src="{{asset('assets/admin')}}/sweetalert/sweetalert.min.js"></script>
<!-- Dropzone -->
<script src="https://unpkg.com/dropzone"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
  // To style all selects
  $('select').selectpicker();
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  $('.custom-file-input').change(function (e) {
      var files = [];
      for (var i = 0; i < $(this)[0].files.length; i++) {
          files.push($(this)[0].files[i].name);
      }
      $(this).next('.custom-file-label').html(files.join(', '));
  });

  function deleted_item( id, track )
  {

    var dataObj       = {};
    dataObj.id        =  id;
    dataObj.track     =  track;
    if( id != null)
    {
      dataObj.id     =  id;
    }
    swal({
      title: "Are you sure?",
      text: "Sure for Delete this data?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel it!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
          $.ajax({
                url: $('#hf_url').val() + '/admin/ajax/delete-item',
                type: 'POST',
                cache: false,
                datatype: 'json',
                data: {data:dataObj},
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                success: function(data)
                {
                  if(data.delete == true)
                  {
                    swal({
                      title: 'Deleted',
                      text: 'Your selected item deleted.',
                      type: 'success',
                      timer: 2000,
                      showCancelButton: false,
                      showConfirmButton: false
                    },
                    function(){ 
                         location.reload();
                     }
                    );
                  }                    
                },
                
                error:function(){}
          });            
      } else {
        swal("Cancelled", "Your data is safe :)", "error");
      }
    });
  }

  function edit_item( id, track )
  {

    var dataObj       = {};
    dataObj.id        =  id;
    dataObj.track     =  track;
    $('#myModal').modal('show');
    $.ajax({
          url: $('#hf_url').val() + '/admin/ajax/edit-item',
          type: 'GET',
          cache: false,
          datatype: 'json',
          data: {data:dataObj},
          headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
          success: function(data)
          {
            if(dataObj.track == 'employees_list'){
              $('#id').val(data.id);
              $('#first_name').val(data.first_name);
              $('#last_name').val(data.last_name);
              $('#company_id').selectpicker();
              $('#company_id').selectpicker('val', data.company_id);
              $('#email').val(data.email);
              $('#phone').val(data.phone);
            }
            if(dataObj.track == 'company_list'){
              $('#id').val(data.id);
              $('#name').val(data.name);
              $('#email').val(data.email);
              $('#website').val(data.website);
              $('#hf_cms_covergal_picture').val(data.logo);
              $('.gallery-cover-picture').find('img').attr('src', $('#hf_url').val() + '/storage/'+ data.logo);
            }
                             
          },
          
          error:function(){}
    }); 
  }

  if($('#gallery_cover_uploader').length>0)
  {
    Dropzone.autoDiscover = false;
    $("#gallery_cover_uploader").dropzone({ 
      url: $('#hf_url').val() + "/admin/ajax/save-related-image",
      paramName: "covergal_picture", 
      acceptedFiles:  "image/*", 
      uploadMultiple:false, 
      maxFiles:1, 
      autoProcessQueue: true, 
      parallelUploads: 100, 
      addRemoveLinks: true, 
      maxFilesize: 10,
      dataType:  'json',
      headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }, 
      init: function() {

            this.on("maxfilesexceeded", function(file){
                swal("" , "Image is larger than 10MB");
            });
            this.on("error", function(file, message){
              if (file.size > 1*10240*10240) 
              {
                swal("" , "File larger");
                this.removeFile(file)
                 return false;
              }
              if(!file.type.match('image.*')) {
                swal("" , "Image file validation");
                this.removeFile(file)
                return false;
              }
            });
            
            this.on("success", function(file, responseText) 
            {
              if(responseText.status === 'success')
              {                
                $('.gallery-cover-picture').find('img').attr('src', $('#hf_url').val() + '/storage/'+ responseText.name);
                $('.gallery-cover-picture').show();
                $('.upload-gallery-cover').hide();
                $('#hf_cms_covergal_picture').val( responseText.name );
                swal("Ok!", "Gambar Anda berhasil diunggah!", "success")

                this.removeAllFiles();
              }
            });
      }
    });
  }

  if($('.remove-gallery-cover').length>0)
  {
    $('.remove-gallery-cover').on('click', function()
    {
      $('.upload-gallery-cover').show();
      $('.gallery-cover-picture').hide();
      $('#hf_cms_covergal_picture').val('');
    });
  }

</script>

@stack('scripts')