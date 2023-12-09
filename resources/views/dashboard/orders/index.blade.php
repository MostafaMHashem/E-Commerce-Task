@extends('layouts.dashboard.adminIndex')


@section('title', 'طلبات العملاء')


@section('css')
@endsection

@section('content')
    <!---------------------- start content -------------------------------------------->
    <div class="content_page">
        <div class="container">
            <div class="row">
                <div class="main_topic  ">
                    <h4> المدن </h4>
                    
                </div>
            </div>


            <!-- card income -->
            <!-- list section -->
            <div class="main_topic  ">
                <h4> كل المدن </h4>
            </div>
            <div class="row">
                <div class="table-responsive">

                    {!! $dataTable->table(
                        [
                            'class' => 'table-responsive table_expenses table_topic',
                        ],
                        true,
                    ) !!}
                </div>



            </div>
        </div>
    </div>
    <!---------------------- finish  content -------------------------------------------->
@endsection


@section('script')
    @include('layouts.dashboard.includes.indexScripts')
    {{ $dataTable->scripts() }}
@endsection
