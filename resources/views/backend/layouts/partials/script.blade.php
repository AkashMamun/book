
 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('backend/js/js_dataTables.bootstrap4.min.js') }}"></script>


 <!-- Core plugin JavaScript-->
 <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

 {{-- select 2 js --}}
 <script src="{{ asset('backend/js/select2.min.js') }}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
 <script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script>

 <script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
    $('.select2').select2();
    });

 </script>