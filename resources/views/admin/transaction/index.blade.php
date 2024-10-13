@extends('admin.layouts.master')

@section('title', 'Transaction')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Transaction</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if(session()->has('transaction'))
                <div>
                    <h1>Giao Dịch: {{ session('transaction.transaction_id') }}</h1>

                    <div class="mt-2">
                        <p>Số Tiền:
                            <b>{{ number_format(session('transaction.amount')) }}đ</b>
                        </p>
                        <p>Số Tài Khoản:
                            <b>{{ session('transaction.receiver_account') }}</b>
                        </p>
                        <p>Trạng Thái:
                            <span class="badge bg-warning p-2 text-xl">{{ session('transaction.status') }}</span>
                        </p>

                        <div class="d-flex gap-2">
                            <button class="btn btn-danger" onclick="handleCancel()">Hủy Giao Dịch</button>
                            @if(session('transaction.status') === 'pending')
                            <button class="btn btn-info" onclick="handleConfirm()">Xác Nhận</button>
                            @endif
                            @if(session('transaction.status') === 'confirmed')
                            <button class="btn btn-success" onclick="handlePay()">Thanh Toán</button>
                            @endif
                        </div>
                    </div>

                    <form hidden id="form-cancel-transaction" action="{{ route('admin.transaction.cancel') }}" method="POST">
                        @csrf
                    </form>

                    <form hidden id="form-confirm-transaction" action="{{ route('admin.transaction.confirm') }}" method="POST">
                        @csrf
                    </form>

                    <form hidden id="form-pay-transaction" action="{{ route('admin.transaction.pay') }}" method="POST">
                        @csrf
                    </form>


                </div>

                @else
                <form action="{{ route('admin.transaction.start') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" />
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success">Submit</button>
                        </div>

                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection


@section('script')

<script>
    const handleCancel = () => {
        showAlertConfirmTrash(() => {
            $("#form-cancel-transaction").submit();
        })
    }

    const handleConfirm = () => {
        $("#form-confirm-transaction").submit();
    }

    const handlePay = () => {
        $("#form-pay-transaction").submit();
    }

</script>

@endsection
