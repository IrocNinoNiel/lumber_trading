@if(session('success'))
    {{-- <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> --}}
    <script>
        alert('Item is on the Cart')
    </script>
@endif

@if(session('deleted'))
    <script>
        alert('Product Deleted')
    </script>
@endif

@if(session('noproduct'))
    <script>
        alert('No Product Selected')
    </script>
@endif

@if(session('error'))
    <script>
        alert('Error Occured')
    </script>
@endif