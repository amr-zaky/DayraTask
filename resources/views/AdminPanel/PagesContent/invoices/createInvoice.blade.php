@extends('AdminPanel.layouts.main')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="createInvoice">
                            <div class="card-body">
                                <p id="errorMessages" style="color: #FFFFFF;background: #0b2e13"></p>
                                <p id="successMessages" style="color: #00f169;background: #0f401b"></p>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" id="amount" class="form-control"
                                           placeholder="Enter Amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="date">Invoice Date</label>
                                    <input type="date" id="date" class="form-control"
                                           placeholder="Enter Amount" required>
                                </div>
                                <input type="hidden" id="client_id" value="{{$client_id}}" class="form-control"
                                       placeholder="Enter Amount" required>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    @push('custom-scripts')
        <script>

            $('#createInvoice').on('submit',function (e) {
                e.preventDefault();
                $('#errorMessages').empty();
                var amount=$('#amount').val();
                var date=$('#date').val();
                var client_id=$('#client_id').val();

                jQuery.ajax({
                    headers: {"Authorization":'Bearer '+localStorage.getItem('token')},
                    url: "{{route('createInvoice')}}",
                    method: 'post',
                    data: {
                        client_id:client_id,
                        amount:amount,
                        invoice_due_date:date
                    },
                    success: function(response){
                        $("#successMessages").append("Invoice Created Successfully And Email Send To Client");
                        $('#amount').val('');
                        $('#date').val('');
                    },
                    error:function (ex) {
                        if (ex.status==401)
                        {
                            localStorage.removeItem('token');
                            window.location="{{route("loginPage")}}"
                        }
                        var errors=ex['responseJSON']['errors'];
                        if (errors['amount'])
                            appendError('amount',errors['amount']);
                        if (errors['invoice_due_date'])
                            appendError('date',errors['invoice_due_date']);
                    }
                });

            });

            function appendError(type,errorMessage)
            {
                $("#errorMessages").append(type+': '+errorMessage+'<br>');
            }
        </script>
    @endpush
@endsection
