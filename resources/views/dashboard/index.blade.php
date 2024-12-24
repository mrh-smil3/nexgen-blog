@extends('dashboard.layouts.main')

@section('main')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card widget widget-stats">
                        <div class="m-3">
                            <div class="mt-2 my-2">
                                <h2>Grafik Kunjungan</h2>
                            </div>
                            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                                <canvas id="dailyChart"></canvas>
                            </div>
                            <div class="chart-container" style="position: relative; height:50vh; width:100%">
                                <canvas id="monthlyChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
