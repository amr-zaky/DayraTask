@extends('AdminPanel.layouts.main')
@section('content')

    <table id= "table" class="table table table-bordered tab-custom-content ml-auto">
        <thead>

        <th>ID</th>
        <th>Amount</th>
        <th>Date</th>
        </thead>
        <tbody id="tableBody">

        </tbody>
    </table>


    @push('custom-scripts')
        <script>
            jQuery.ajax({
                headers: {"Authorization":'Bearer '+localStorage.getItem('token')},
                url: "{{route('getAllInvoices')}}",
                method: 'get',
                success: function(response){
                    var invoices=response['data'];
                    invoices.forEach(appendClients);
                },
                error:function (ex) {
                    if (ex.status==401)
                    {
                        localStorage.removeItem('token');
                        window.location="{{route("loginPage")}}"
                    }
                    alert('error');
                }
            });


            function appendClients(invoice)
            {
                var tr;
                tr = $('<tr/>');
                tr.append("<td>" + invoice.id + "</td>");
                tr.append("<td>" + invoice.amount + "</td>");
                tr.append("<td>" + invoice.invoice_due_date + "</td>");
                $('#tableBody').append(tr);
            }
        </script>
    @endpush

@endsection
