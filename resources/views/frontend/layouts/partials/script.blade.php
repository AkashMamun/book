
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
  {{-- select 2 js --}}
  <script src="{{ asset('backend/js/select2.min.js') }}"></script>

  {{-- summernote js --}}
  <script src="{{ asset('backend/js/summernote.js') }}"></script>

  <script>
    $(document).ready( function () {
      $('#dataTable').DataTable();
      $('.select2').select2();
      $('#summernote').summernote();
    });

 </script>
