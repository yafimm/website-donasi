@if(Session::has('flash_message'))
  <div class="sufee-alert alert with-close {{ Session::get('alert-class') }} alert-dismissible fade show">
      <span class="badge badge-pill <?php if(Session::get('alert-class') == 'alert-danger'){echo 'badge-danger';}else{echo 'badge-success';}?>">
        <?php if(Session::get('alert-class') == 'alert-danger'){ echo 'Failed'; }else{ echo 'Success'; } ?>
      </span>
      {{ Session::get('flash_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
