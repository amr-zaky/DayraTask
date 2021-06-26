@extends('AdminPanel.layouts.main')
@section('content')

    <table id= "table" class="table table table-bordered tab-custom-content ml-auto">
        <thead>

            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Actions</th>
        </thead>
        <tbody id="tableBody">

        </tbody>
    </table>


@push('custom-scripts')
    <script>
        jQuery.ajax({
            headers: {"Authorization":'Bearer '+localStorage.getItem('token')},
            url: "{{route('getAllClients')}}",
            method: 'get',
            success: function(response){
              var clients=response['data']['clients'];
                clients.forEach(appendClients);
            },
            error:function (ex) {
                alert('error');
            }
        });


        function appendClients(client)
        {
            var addInvoiceUrl = '{{ route("createInvoiceToClient", ":id") }}';
            addInvoiceUrl = addInvoiceUrl.replace(':id', client.id);

            var getClientDetailUrl = '{{ route("getClientDetailPage", ":id") }}';
            getClientDetailUrl=getClientDetailUrl.replace(':id', client.id);
            var tr;
            tr = $('<tr/>');
            tr.append("<td>" + client.id + "</td>");
            tr.append("<td>" + client.full_name + "</td>");
            tr.append("<td>" + client.email + "</td>");
            tr.append("<td>" + client.mobile + "</td>");
            tr.append("<td><a href='"+addInvoiceUrl+"' class='btn btn-dark'>Add Invoice</a>  <a class='btn btn-success' href='"+getClientDetailUrl+"'>View Client</a>");
            $('#tableBody').append(tr);
        }
    </script>
@endpush

@endsection
