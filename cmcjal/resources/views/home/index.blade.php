@extends('layouts.main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3><i class="fa fa-user-md" aria-hidden="true"></i>&nbsp;¡BIENVENIDO!</h3></div>

        <div class="panel-body">
            A su panel de adiministrador <b>CMCJAL</b>.
        </div>
    </div>
@endsection

@section('pageHeader')
<header class="page-header">
    <h2>Panel de Control</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Panel de Control</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>
@endsection
