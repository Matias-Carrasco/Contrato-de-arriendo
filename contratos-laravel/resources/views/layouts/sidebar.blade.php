<!-- head -->
@include('includes.head')
<!-- fin head -->


<body>
    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        @include('includes.sidebar')
        <!-- fin sideBar -->

        <div class="w-100">

            <!-- Navbar -->
            @include('includes.header')
            <!-- Fin Navbar -->

            <!-- Page Content -->
            @yield('content')

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        @yield('js')

  

   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
            integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
            <script> <?php include public_path('jquery.rut.js'); ?> </script>
        <script type="text/javascript">
        </script>

</body>

</html>
